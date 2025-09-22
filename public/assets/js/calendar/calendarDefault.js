document.addEventListener('DOMContentLoaded', function() {
    const rawEvents = Array.isArray(window.childEvents) ? window.childEvents : [];

    const calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
        initialView: 'timeGridWeek',
        timeZone: 'local',
        headerToolbar: false,
        hiddenDays: [0],
        allDaySlot: false,
        slotMinTime: '07:00:00',
        slotMaxTime: '18:00:00',
        slotDuration: '01:00:00',
        slotLabelInterval: '01:00',
        dayHeaderFormat: { weekday: 'long' },
        displayEventEnd: true,
        height: 800,
        expandRows: true,
        nowIndicator: true,
        eventMaxStack: 2,
        
        events: rawEvents.map(e => ({
        ...e,
        title: shorten(e.title || ''),
        extendedProps: {
            ...(e.extendedProps || {}),
            _fullTitle: e.title || '',
            startTime: e.startTime,
            endTime: e.endTime
        }
        })),

        eventContent(arg) {
        return {
            html: `
            <div style="text-align:left; padding:2px;">
                <div><strong>${arg.timeText}</strong></div>
                <div>${arg.event.title || ''}</div>
            </div>
            `
        };
        },

        eventDidMount(info) {
        const full = info.event.extendedProps._fullTitle || info.event.title || '';
        info.el.title = full;
        },

        eventClick(info) {
            const e = info.event;

            const dow = e.start
                ? info.view.calendar.formatDate(e.start, { weekday: 'long' })
                : (e._def?.recurringDef?.typeData?.daysOfWeek?.[0] ?? '');

            const time = `${e.extendedProps.startTime || ''} - ${e.extendedProps.endTime || ''}`;

            const roomEl    = document.getElementById('modalRoom');
            const subjEl    = document.getElementById('modalSubject');
            const dayEl     = document.getElementById('modalDay');
            const timeEl    = document.getElementById('modalTime');
            
            const roomName  = e.extendedProps.room_name || e.title || '—';
            const subject   = e.extendedProps.subject || '—';

            if (roomEl) roomEl.textContent = roomName;
            if (subjEl) subjEl.textContent = subject;
            if (dayEl)  dayEl.textContent  = dow || '—';
            if (timeEl) timeEl.textContent = time || '—';

            const ul    = document.getElementById('modalStudents');
            const empty = document.getElementById('modalStudentsEmpty');

            function renderStudents(list) {
                const ul    = document.getElementById('modalStudents');
                const empty = document.getElementById('modalStudentsEmpty');

                if (!ul || !empty) return;

                ul.innerHTML = '';
                if (Array.isArray(list) && list.length > 0) {
                    list.forEach(s => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item d-flex align-items-center';
                    
                    const tmpl = window.childProfileUrlTemplate || '';
                    const url  = tmpl.replace('___CHILD___', s.id);

                    li.innerHTML = `
                        <i class="fas fa-user mr-2 text-muted"></i>
                        <a href="${url}" class="text-primary font-weight-bold">${s.name}</a>
                    `;
                    ul.appendChild(li);
                    });
                    ul.classList.remove('d-none');
                    empty.classList.add('d-none');
                } else {
                    ul.classList.add('d-none');
                    empty.classList.remove('d-none');
                }
            }

            const scheduleId = e.extendedProps?.schedule_id || e.id;
            const tmpl = window.teacherStudentsUrlTemplate || '';

            if (tmpl && scheduleId) {
            const url = tmpl.replace('___SCHEDULE___', scheduleId);

            if (ul) {
                ul.innerHTML = `
                <li class="list-group-item d-flex align-items-center text-muted">
                    <i class="fas fa-spinner fa-spin mr-2"></i> Loading...
                </li>`;
                const wrap = document.getElementById('studentList');
                if (wrap && wrap.classList.contains('collapse')) wrap.classList.add('show');
            }

            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' }})
                .then(r => r.ok ? r.json() : Promise.reject())
                .then(json => renderStudents(json.students || []))
                .catch(() => renderStudents([]));
            } else {
            renderStudents([]);
            }

            if (window.jQuery && $('#eventModal').length) {
                $('#eventModal').modal('show');
            }
        },
    });

    calendar.render();

    function shorten(t) {
        const max = 22;
        return (t && t.length > max) ? t.slice(0, max - 1) + '…' : t;
    }
});
