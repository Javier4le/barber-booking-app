let $barber, $date, $service, iRadio;
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
    $service = $('#service');

    $hoursMorning = $('#hours-morning');
    $hoursAfternoon = $('#hours-afternoon');
    $titleMorning = $('#title-morning');
    $titleAfternoon = $('#title-afternoon');


    $service.change(() => {
        const serviceId = $service.val();
        // const url = `/dashboard/client/${serviceId}/barbers`;
        const url = `/api/services/${serviceId}/barbers`;
        $.getJSON(url, onBarbersLoaded);
    });

    $barber.change(loadAvailableHours);
    $date.change(loadAvailableHours);
})


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

    if (!htmlHoursMorning != '') {
        htmlHoursMorning = noHours;
    }

    if (data.afternoon) {
        const afternoon_intervals = data.afternoon;

        afternoon_intervals.forEach(interval => {
            htmlHoursAfternoon += getRadioIntervalHTML(interval);
        });
    }

    if (!htmlHoursAfternoon != '') {
        htmlHoursAfternoon = noHours;
    }


    $hoursMorning.html(htmlHoursMorning);
    $hoursAfternoon.html(htmlHoursAfternoon);
    $titleMorning.html(titleMorning);
    $titleAfternoon.html(titleAfternoon);
}


function getRadioIntervalHTML(interval) {
    const text = `${interval.start} - ${interval.end}`;

    return `<div class="custom-control custom-radio m-3">
                <input type="radio" id="interval_${iRadio}" name="interval" class="custom-control-input" value="${interval.id}">
                <label class="custom-control-label" for="interval_${iRadio++}">${text}</label>
            </div>`;
}





// cargar barberos por local y servicio
// $('#location').on('change', function() {
//     let location_id = $(this).val();
//     let service_id = $('#service').val();

//     if (location_id && service_id) {
//         $.get(`/api/locations/${location_id}/services/${service_id}/barbers`, function(data) {
//             let htmlOptions = '<option value="">Seleccione un barbero</option>';
//             data.forEach(barber => {
//                 htmlOptions +=  `<option value="${barber.id}">${barber.first_name} ${barber.last_name ?? ''}</option>`;
//             });
//             $barber.html(htmlOptions);
//         });
//     }
// });



// // cargar barberos por servicio y local
// $('#service').on('change', function() {
//     let service_id = $(this).val();
//     let local_id = $('#local').val();

//     if (service_id && local_id) {
//         $.get('/api/locations/' + local_id + '/services/' + service_id + '/barbers', function(data) {
//             let htmlOptions = '<option value="">Seleccione un barbero</option>';
//             data.forEach(barber => {
//                 htmlOptions +=  `<option value="${barber.id}">${barber.first_name} ${barber.last_name ?? ''}</option>`;
//             });
//             $barber.html(htmlOptions);
//         });
//     }
// });
