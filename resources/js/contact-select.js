// Enhance the native select while preserving its form value and validation.
const projectSelect = document.querySelector('#contact-type');
if (projectSelect) {
    const wrapper = document.createElement('div');
    wrapper.className = 'project-select';
    projectSelect.before(wrapper);
    wrapper.append(projectSelect);
    const trigger = document.createElement('button');
    trigger.type = 'button';
    trigger.className = 'project-select__trigger';
    trigger.id = 'project-type-trigger';
    trigger.setAttribute('role', 'combobox');
    trigger.setAttribute('aria-haspopup', 'listbox');
    trigger.setAttribute('aria-expanded', 'false');
    trigger.setAttribute('aria-controls', 'project-type-options');
    trigger.setAttribute('aria-required', 'true');
    const label = document.querySelector('label[for="contact-type"]');
    label.id = 'project-type-label';
    label.htmlFor = trigger.id;
    trigger.setAttribute('aria-labelledby', label.id + ' ' + trigger.id);
    const list = document.createElement('div');
    list.id = 'project-type-options';
    list.className = 'project-select__options';
    list.setAttribute('role', 'listbox');
    list.setAttribute('aria-labelledby', label.id);
    list.hidden = true;
    const options = [...projectSelect.options].filter(option => option.value && !option.disabled);
    let active = 0;
    const items = options.map((option, index) => {
        const item = document.createElement('div');
        item.id = 'project-type-option-' + index;
        item.className = 'project-select__option';
        item.setAttribute('role', 'option');
        item.textContent = option.textContent;
        // Keep focus on the combobox until click selects the option. Otherwise
        // focusout hides this non-focusable item before its click can fire.
        item.addEventListener('pointerdown', event => event.preventDefault());
        item.addEventListener('click', () => choose(index));
        list.append(item);
        return item;
    });
    const sync = () => {
        trigger.textContent = projectSelect.selectedOptions[0]?.textContent || 'What can I help you with?';
        trigger.classList.toggle('is-placeholder', !projectSelect.value);
        items.forEach((item, index) => item.setAttribute('aria-selected', String(options[index].value === projectSelect.value)));
    };
    const highlight = index => {
        active = (index + items.length) % items.length;
        items.forEach((item, i) => item.classList.toggle('is-active', i === active));
        trigger.setAttribute('aria-activedescendant', items[active].id);
        items[active].scrollIntoView({ block: 'nearest' });
    };
    const close = () => {
        list.hidden = true;
        trigger.setAttribute('aria-expanded', 'false');
        trigger.removeAttribute('aria-activedescendant');
    };
    const open = () => {
        list.hidden = false;
        trigger.setAttribute('aria-expanded', 'true');
        highlight(Math.max(0, options.findIndex(option => option.value === projectSelect.value)));
    };
    const choose = index => {
        projectSelect.value = options[index].value;
        projectSelect.dispatchEvent(new Event('change', { bubbles: true }));
        trigger.removeAttribute('aria-invalid');
        close();
        trigger.focus();
    };
    trigger.addEventListener('click', () => list.hidden ? open() : close());
    trigger.addEventListener('keydown', event => {
        if (['ArrowDown', 'ArrowUp', 'Home', 'End', 'Enter', ' '].includes(event.key)) {
            event.preventDefault();
            if (list.hidden) { open(); return; }
            if (event.key === 'ArrowDown') highlight(active + 1);
            else if (event.key === 'ArrowUp') highlight(active - 1);
            else if (event.key === 'Home') highlight(0);
            else if (event.key === 'End') highlight(items.length - 1);
            else choose(active);
        } else if (event.key === 'Escape') { event.preventDefault(); close(); }
        else if (event.key === 'Tab') close();
        else if (event.key.length === 1 && !event.ctrlKey && !event.metaKey && !event.altKey) {
            if (list.hidden) open();
            const index = options.findIndex(option => option.textContent.toLowerCase().startsWith(event.key.toLowerCase()));
            if (index >= 0) highlight(index);
        }
    });
    document.addEventListener('pointerdown', event => { if (!wrapper.contains(event.target)) close(); });
    wrapper.addEventListener('focusout', event => { if (!wrapper.contains(event.relatedTarget)) close(); });
    projectSelect.addEventListener('change', sync);
    projectSelect.addEventListener('invalid', event => {
        event.preventDefault();
        trigger.setAttribute('aria-invalid', 'true');
        trigger.focus();
        open();
    });
    projectSelect.form?.addEventListener('reset', () => setTimeout(() => { sync(); close(); trigger.removeAttribute('aria-invalid'); }, 0));
    wrapper.append(trigger, list);
    projectSelect.hidden = true;
    sync();
}
