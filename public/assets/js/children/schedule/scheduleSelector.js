document.addEventListener('DOMContentLoaded', () => {
  const teacherSel  = document.getElementById('teacher_id');
  const schedSel    = document.getElementById('schedule_id');
  const saveBtn     = document.getElementById('saveBtn');
  const container   = document.getElementById('schedulePreviewContainer');

  const urlTemplate = teacherSel?.dataset?.scheduleUrlTemplate || '';
  const PLACEHOLDER = '___TEACHER___';

  function setSaveState() {
    const any = container.querySelector('input[name="schedule_ids[]"]');
    saveBtn.disabled = !any;
  }

  function resetScheduleSelect() {
    if (!schedSel) return;
    schedSel.innerHTML = '<option value="">-- Select Schedule --</option>';
    schedSel.disabled = true;
    setSaveState();
  }

  function removeOptionByValue(value) {
    if (!schedSel) return;
    const opt = [...schedSel.options].find(o => o.value === String(value));
    if (opt) opt.remove();
    if (schedSel.options.length <= 1) schedSel.disabled = true;
  }

  function addOption(value, label) {
    if (!schedSel) return;
    const exists = [...schedSel.options].some(o => o.value === String(value));
    if (!exists) {
      const opt = document.createElement('option');
      opt.value = value;
      opt.textContent = label;
      schedSel.appendChild(opt);
    }
    schedSel.disabled = false;
  }

  function alreadyAdded(value) {
    return !![...container.querySelectorAll('input[name="schedule_ids[]"]')]
      .find(inp => inp.value === String(value));
  }

  function createPreviewRow(label, value) {
    if (!value || alreadyAdded(value)) return;

    removeOptionByValue(value);

    const wrapper = document.createElement('div');
    wrapper.className = 'alert alert-light border d-flex justify-content-between align-items-center';
    wrapper.dataset.value = value;
    wrapper.dataset.label = label;
    wrapper.innerHTML = `
      <div>
        <div class="mb-1 font-weight-bold">
          <i class="fa fa-calendar mr-1"></i> Selected Schedule
        </div>
        <div class="small text-muted">${label}</div>
        <input type="hidden" name="schedule_ids[]" value="${value}">
      </div>
      <button type="button" class="btn btn-sm btn-danger remove-btn" title="Remove">
        <i class="fa fa-times"></i>
      </button>
    `;

    wrapper.querySelector('.remove-btn').addEventListener('click', () => {
      addOption(wrapper.dataset.value, wrapper.dataset.label);
      wrapper.remove();
      setSaveState();
    });

    container.appendChild(wrapper);
    setSaveState();
  }

  async function loadSchedules(teacherId) {
    resetScheduleSelect();
    if (!teacherId || !urlTemplate) return;

    const loadingOpt = document.createElement('option');
    loadingOpt.textContent = 'Loading...';
    loadingOpt.disabled = true; loadingOpt.selected = true;
    schedSel.appendChild(loadingOpt);

    try {
      const url = urlTemplate.replace(PLACEHOLDER, teacherId);
      const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
      if (!res.ok) throw new Error('Failed to load schedules');

      const data = await res.json();
      schedSel.innerHTML = '<option value="">-- Select Schedule --</option>';
      data.forEach(row => {
        if (!alreadyAdded(row.id)) {
          const opt = document.createElement('option');
          opt.value = row.id;
          opt.textContent = row.label;
          schedSel.appendChild(opt);
        }
      });
      schedSel.disabled = schedSel.options.length <= 1;
    } catch (err) {
      console.error(err);
      schedSel.innerHTML = '<option value="">-- Failed to load --</option>';
    }
  }
  
  function preloadExisting() {
    if (!Array.isArray(window.existingSchedules) || window.existingSchedules.length === 0) {
      return;
    }
    window.existingSchedules.forEach(item => {
      if (!alreadyAdded(item.id)) {
        createPreviewRow(item.label, item.id);
      }
    });
    
    const last = window.existingSchedules[window.existingSchedules.length - 1];
    if (teacherSel && last?.teacher_id) {
      teacherSel.value = String(last.teacher_id);
      loadSchedules(last.teacher_id);
    }
  }

  if (teacherSel) {
    teacherSel.addEventListener('change', e => {
      loadSchedules(e.target.value);
    });
  }

  if (schedSel) {
    schedSel.addEventListener('change', e => {
      const value = e.target.value;
      const label = e.target.selectedOptions[0]?.textContent || '';
      if (value) {
        createPreviewRow(label, value);
        schedSel.value = '';
      }
    });
  }

  if (window.jQuery && $('#addModal').length) {
    $('#addModal').on('show.bs.modal', () => {
      resetScheduleSelect();
      preloadExisting();
      setSaveState();
    });
  } else {
    resetScheduleSelect();
    preloadExisting();
    setSaveState();
  }
});
