    // Full JavaScript: fetch external CSV once on load and render date + fuel items into #fuelPrices
    // Update CSV_URL to point to your actual CSV file location
    const CSV_URL = 'assets/fuel-prices.csv';

    // Parse CSV text into array of objects (simple CSV without quoted commas)
    function parseCSV(text) {
      const lines = text.trim().split(/\r?\n/).filter(Boolean);
      if (!lines.length) return [];
      const headers = lines.shift().split(',').map(h => h.trim());
      return lines.map(line => {
        const cols = line.split(',').map(c => c.trim());
        const obj = {};
        headers.forEach((h, i) => obj[h] = cols[i] ?? '');
        return obj;
      });
    }

    // Convert date string like "12-Dec-25" or "12-Dec-2025" to a Date for sorting
    function parseDate(d) {
      if (!d) return new Date(0);
      const parts = d.split('-');
      if (parts.length !== 3) return new Date(d);
      const day = parseInt(parts[0], 10);
      const monthStr = parts[1].slice(0,3).toLowerCase();
      const year = parts[2].length === 2 ? '20' + parts[2] : parts[2];
      const monthNames = {
        jan: '01', feb: '02', mar: '03', apr: '04', may: '05', jun: '06',
        jul: '07', aug: '08', sep: '09', oct: '10', nov: '11', dec: '12'
      };
      const m = monthNames[monthStr] || '01';
      return new Date(`${year}-${m}-${String(day).padStart(2,'0')}`);
    }

    // Build a single fuel item DIV — concise change text (e.g., "Down 4.0")
    function buildFuelItem(name, curVal, prevVal) {
      const item = document.createElement('div');
      item.className = 'fuel-item ';

      // Left meta (name + small label)
      const meta = document.createElement('div');
      meta.style.display = 'flex';
      meta.style.flexDirection = 'row';
      meta.innerHTML = `<div class="fuel-name">${name}</div>`;

      // Change block (icon + concise text)
      const change = document.createElement('div');
      change.className = 'fuel-change';
      change.style.display = 'flex';
      change.style.flexDirection = 'row';

      let icon = '—', cls = 'same', title = 'No previous value', changeText = 'No previous';
      if (prevVal !== null && !isNaN(prevVal) && !isNaN(curVal)) {
        const diff = Math.abs(curVal - prevVal);
        if (curVal > prevVal) {
          icon = '▲';
          cls = 'up';
          title = `${prevVal.toFixed(1)}`;
          changeText = ` ${diff.toFixed(1)}`;
        } else if (curVal < prevVal) {
          icon = '▼';
          cls = 'down';
          title = `${prevVal.toFixed(1)}`;
          changeText = ` ${diff.toFixed(1)}`;
        } else {
          icon = '—';
          cls = 'same';
          title = `No change ${prevVal.toFixed(1)}`;
          changeText = 'NC';
        }
      }

      const iconEl = document.createElement('span');
      iconEl.className = `change-icon ${cls}`;
      iconEl.setAttribute('title', title);
      iconEl.setAttribute('aria-hidden', 'true');
      iconEl.textContent = icon;

      const textEl = document.createElement('div');
      textEl.className = 'change-text';
      textEl.textContent = changeText;

      change.appendChild(iconEl);
      change.appendChild(textEl);

      // Price on the right
      const price = document.createElement('div');
      price.className = 'fuel-price';
      price.textContent = isNaN(curVal) ? '-' : curVal.toFixed(1);

      item.appendChild(meta);
      item.appendChild(price);
      item.appendChild(change);
      

      return item;
    }

    // Render date and fuel items into #fuelPrices
    function renderFuelDivs(rows) {
      const container = document.getElementById('fuelPrices');
      if (!container) return;
      container.innerHTML = '';

      if (!rows || rows.length === 0) {
        container.textContent = 'No price data available';
        return;
      }

      // sort by date ascending and pick latest two
      rows.sort((a, b) => parseDate(a.Date) - parseDate(b.Date));
      const latest = rows[rows.length - 1];
      const previous = rows.length > 1 ? rows[rows.length - 2] : null;

      // Date block (single)
      const dateBlock = document.createElement('div');
      dateBlock.id = 'fuel-date';
      dateBlock.className = 'fuel-date-block';
      dateBlock.textContent =  `${latest.Date}`;
      container.appendChild(dateBlock);

      // Fuel list container
      const list = document.createElement('div');
      list.id = 'fuel-list';
      list.className = 'fuel-list';

      const fuelCols = Object.keys(latest).filter(h => h !== 'Date');
      fuelCols.forEach(col => {
        const curVal = parseFloat(latest[col]);
        const prevVal = previous ? parseFloat(previous[col]) : null;
        const item = buildFuelItem(col, curVal, prevVal);
        list.appendChild(item);
      });

      container.appendChild(list);
    }

    // Fetch CSV and render once on load (cache-busted)
    async function fetchAndRender() {
      try {
        const res = await fetch(CSV_URL + '?t=' + Date.now(), { cache: 'no-store' });
        if (!res.ok) throw new Error('Network response not ok: ' + res.status);
        const text = await res.text();
        const rows = parseCSV(text);
        renderFuelDivs(rows);
      } catch (err) {
        console.error('Error loading CSV:', err);
        const container = document.getElementById('fuelPrices');
        if (container) container.textContent = 'Error loading prices';
      }
    }

    // Run on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', () => {
      fetchAndRender();
    });