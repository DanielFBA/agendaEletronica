<script>
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";

export default {
    components: {
        FullCalendar,
    },
    data() {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin],
                initialView: "dayGridMonth",
                locale: "pt-br",
                dateClick: this.handleDateClick,
                eventClick: this.handleEventClick,
                events: this.tasks,
            },
        };
    },
    methods: {
        handleDateClick(arg) {
            alert("date click! " + arg.dateStr);
        },
        handleEventClick(info) {
            this.$emit('eventClick', {
                id: info.event.id,
                title: info.event.title,
                description: info.event.extendedProps.description,
                start_date:  info.event.extendedProps.start_date,
                end_date:  info.event.extendedProps.end_date,
                start: info.event.start,
                end: info.event.end,
                status: info.event.extendedProps.status
            });
        },
    },
    props: {
        tasks: {
            type: Array,
            required: true,
        },
    },
};
</script>

<template>
    <FullCalendar :options="calendarOptions" :tasks="tasks" />
</template>