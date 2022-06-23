import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import momentPlugin from '@fullcalendar/moment';
import esLocale from '@fullcalendar/core/locales/es';

const initCalendar = ($calendar) => {
    const selectSlot = (event) => {
        if (moment().isAfter(event.end)) {
            return;
        }

        calendar.unselect();
        calendar.addEvent({
            start: event.start,
            end: event.end
        });
    };

    const removeSlot = (element) => {
        if (element.event.rendering) return;
        element.event.remove();
    };

    const dateRange = (today) => {
        return {
            start: moment(today).toDate(),
            end: moment(today).add(2, 'months').toDate()
        };
    };

    const day_min_time = process.env.MIX_QD_ADVICE_DAY_START_TIME;
    const day_max_time = process.env.MIX_QD_ADVICE_DAY_END_TIME;

    const day_minutes = 960;    // 1440;
    const base_row_height = 24; // px
    const slot_duration = 10;   //$calendar.dataset.slotDuration || 20;
    const content_height = ((day_minutes / slot_duration) * base_row_height) + 150;

    let options = {
        locale: esLocale,
        contentHeight: content_height,
        plugins: [
            momentPlugin, dayGridPlugin, interactionPlugin, timeGridPlugin
        ],
        defaultView: 'timeGridWeek',
        header: {
            left: 'prev,next,today',
            center: 'title',
            right: 'timeGridWeek,timeGridDay'
        },
        navLinks: true,
        nowIndicator: true,
        selectable: true,
        selectOverlap: false,
        eventOverlap: false,
        defaultEventMinutes: 30,
        allDaySlot: false,
        minTime: day_min_time,
        maxTime: day_max_time,
        slotDuration: {
            minutes: slot_duration
        },
        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            hour12: false,
            meridiem: 'short'
        },
        select: selectSlot,
        eventClick: removeSlot,
        validRange: dateRange,
        visibleRange: dateRange
    };

    if ($calendar.dataset.events) {
        let events = JSON.parse($calendar.dataset.events);
        if ($calendar.dataset.background) {
            let background = JSON.parse($calendar.dataset.background);
            background.map((event) => {
                event.rendering = 'background';
                event.color = '#ff9494';
                event.editable = false;
                return event;
            });
            events = [].concat(events, background);
        }
        options.events = events;
    }

    if ($calendar.dataset.constraints) {
        options.selectConstraint = JSON.parse($calendar.dataset.constraints);
        options.eventConstraint = JSON.parse($calendar.dataset.constraints);
    }

    const calendar = new Calendar($calendar, options);
    calendar.render();
    calendar.onSubmit = (form_selector) => {
        const $form = document.querySelector(form_selector);

        const createInput = (event, count, label) => {
            let $field = document.createElement('input');
            $field.type = 'hidden';
            $field.name = `slots[${count}][${label}]`;
            $field.value = moment(event[label]).format('YYYY-MM-DD HH:mm:ss');
            $form.appendChild($field);
        };

        let count = 0;
        for (const event of calendar.getEvents()) {
            if (event.rendering) continue;
            createInput(event, count, 'start');
            createInput(event, count, 'end');
            count++;
        }
        return;
    };
    return calendar;
};

const init = (selector) => {
    const $calendar_container = document.querySelector(selector);
    return initCalendar($calendar_container);
};

export default init;
