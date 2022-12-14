let $barber, $date, $service, $location, iRadio;
let $hoursMorning, $hoursAfternoon, $titleMorning, $titleAfternoon;

const titleMorning = `
    En la mañana
`;
const titleAfternoon = `
    En la tarde
`;
const noHours = `
    <h5 class="text-danger">
        No hay horarios disponibles para este día
    </h5>
`;



$(function() {
    $barber = $('#barber');
    $date = $('#date');
    $location = $('#location');
    $service = $('#service');

    $hoursMorning = $('#hours-morning');
    $hoursAfternoon = $('#hours-afternoon');
    $titleMorning = $('#title-morning');
    $titleAfternoon = $('#title-afternoon');


    // cargar servicios segun la locacion y barberos segun el servicio en una misma funcion


    // Load services when location changes and barbers when service changes

    $location.change(() => {
        let locationId = $location.val();
        const url = `/api/locations/${locationId}/services`;
        $.getJSON(url, onServicesLoaded);

        $service.change(() => {
            let serviceId = $service.val();
            const urlBarbers = `/api/services/${serviceId}/barbers`;
            $.getJSON(urlBarbers, onBarbersLoaded);
        });
    });


    $barber.change(loadAvailableHours);
    $date.change(loadAvailableHours);
})


function onServicesLoaded(services) {
    let htmlOptions = '<option value="">Seleccione un servicio</option>';

    services.forEach(service => {
        htmlOptions += `<option value="${service.id}">${service.name} (${service.duration} min. -  $${service.price})</option>`;
    });

    $service.html(htmlOptions);
};



function onBarbersLoaded(barbers) {
    let htmlOptions = '<option value="">Seleccione un barbero</option>';

    barbers.forEach(barber => {
        htmlOptions += `<option value="${barber.id}">${barber.first_name} ${barber.last_name ?? ''}</option>`;
    });

    $barber.html(htmlOptions);
    loadAvailableHours();
}


function loadAvailableHours() {
    const selectedDate = $date.val();
    const barberId = $barber.val();
    const url = `/api/schedule/hours?date=${selectedDate}&barber_id=${barberId}`;
    $.getJSON(url, displayHours);
}


function displayHours(data) {
    let htmlHoursMorning = '';
    let htmlHoursAfternoon = '';

    iRadio = 0;

    if (data.morning) {
        const morning_intervals = data.morning;

        morning_intervals.forEach(interval => {
            htmlHoursMorning += getRadioIntervalHTML(interval);
        });
    }

    if (!htmlHoursMorning != "") {
        htmlHoursMorning += noHours;
    }

    if (data.afternoon) {
        const afternoon_intervals = data.afternoon;

        afternoon_intervals.forEach(interval => {
            htmlHoursAfternoon += getRadioIntervalHTML(interval);
        });
    }

    if (!htmlHoursAfternoon != "") {
        htmlHoursAfternoon += noHours;
    }


    $hoursMorning.html(htmlHoursMorning);
    $hoursAfternoon.html(htmlHoursAfternoon);
    $titleMorning.html(titleMorning);
    $titleAfternoon.html(titleAfternoon);
}


function getRadioIntervalHTML(interval) {
    const text = `${interval.start} - ${interval.end}`;

    return `<div class="custom-control custom-radio m-3">
                <input type="radio" id="interval_${iRadio}" name="scheduled_time" value="${interval.start}" class="custom-control-input" required>
                <label class="custom-control-label" for="interval_${iRadio++}">${text}</label>
            </div>`;
}
