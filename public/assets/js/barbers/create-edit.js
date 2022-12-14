let $location, $services;



$(function() {
    $location = $('#location');
    $services = $('#services');

    // $services.selectpicker('refresh');

    // Load services when location changes
    $location.change(() => {
        let locationId = $location.val();
        const url = `/api/locations/${locationId}/services`;
        $.getJSON(url, onServicesLoaded);
    });

    // $services.selectpicker('refresh');
})


function onServicesLoaded(services) {
    let htmlOptions = '';

    services.forEach(service => {
        htmlOptions += `<option value="${service.id}">${service.name}</option>`;
    });

    $services.html(htmlOptions);
    $services.selectpicker('refresh');
};


