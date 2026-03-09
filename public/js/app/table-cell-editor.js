const registerTableCellEditor = () => {
    console.log('[TableCellEditor] register attempt', {
        alpine: !!window.Alpine,
        alpineVersion: window.Alpine?.version,
    });
    if (!window.Alpine) return;
    Alpine.data('tableCellEditor', () => ({
        show: false,
        activeEl: null,
        pos: { top: 0, left: 0 },
        init() {
            console.log('[TableCellEditor] init');
            document.addEventListener('focusin', (event) => {
                const target = event.target;
                if (target && target.dataset && target.dataset.tableCell === '1') {
                    console.log('[TableCellEditor] focus cell', target);
                    this.activeEl = target;
                    this.show = true;
                    this.setPosition();
                }
            });

            document.addEventListener('click', (event) => {
                if (!this.show) return;
                const insideToolbar = event.target.closest('[x-data]');
                const insideCell = event.target.closest('[data-table-cell="1"]');
                if (!insideToolbar && !insideCell) {
                    this.show = false;
                }
            });

            window.addEventListener('scroll', () => {
                if (this.show) {
                    this.setPosition();
                }
            }, true);

            window.addEventListener('resize', () => {
                if (this.show) {
                    this.setPosition();
                }
            });
        },
        setPosition() {
            if (!this.activeEl) return;
            const rect = this.activeEl.getBoundingClientRect();
            this.pos = {
                top: rect.top,
                left: rect.right + 8,
            };
        },
        wrap(tag) {
            if (!this.activeEl) return;
            const el = this.activeEl;
            const start = el.selectionStart ?? 0;
            const end = el.selectionEnd ?? 0;
            const value = el.value ?? '';
            const open = `<${tag}>`;
            const close = `</${tag}>`;
            el.value = value.slice(0, start) + open + value.slice(start, end) + close + value.slice(end);
            el.dispatchEvent(new Event('input', { bubbles: true }));
            el.focus();
        },
        applyColor(color) {
            if (!color) return;
            this.wrapWithSpan(`color:${color};`);
        },
        applySize(size) {
            if (!size) return;
            this.wrapWithSpan(`font-size:${size};`);
        },
        applyHighlight(color) {
            if (!color) return;
            this.wrapWithSpan(`background-color:${color};`);
        },
        wrapWithSpan(style) {
            if (!this.activeEl) return;
            const el = this.activeEl;
            const start = el.selectionStart ?? 0;
            const end = el.selectionEnd ?? 0;
            const value = el.value ?? '';
            const open = `<span style="${style}">`;
            const close = `</span>`;
            el.value = value.slice(0, start) + open + value.slice(start, end) + close + value.slice(end);
            el.dispatchEvent(new Event('input', { bubbles: true }));
            el.focus();
        },
    }));
};

document.addEventListener('alpine:init', registerTableCellEditor);
registerTableCellEditor();
