
    function handleFileSelectCorporate(file_id_one, file_id_two, file_id_three, file_id_four) {
        if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
            alert('The File APIs are not fully supported in this browser.');
            return;
        }
        input_one = document.getElementById(file_id_one);
        input_two = document.getElementById(file_id_two);
        input_three = document.getElementById(file_id_three);
        input_four = document.getElementById(file_id_four);
        if (!input_one && !input_two && !input_three && !input_four) {
            alert("Um, couldn't find the fileinput element.");
        }
        else if (!input_one.files && !input_two.files && !input_three.files && !input_four.files) {
            alert("This browser doesn't seem to support the `files` property of file inputs.");
        }
        else if (!input_one.files[0] && !input_two.files[0] && !input_three.files[0] && !input_four.files[0]) {
            alert("Please select a file before clicking 'Load'");
        }
        else {
            var file_one = input_one.files[0];
            fr_one = new FileReader();
            fr_one.readAsDataURL(file_one);
            var file_two = input_two.files[0];
            fr_two = new FileReader();
            fr_two.readAsDataURL(file_two);
            var file_three = input_one.files[0];
            fr_three = new FileReader();
            fr_three.readAsDataURL(file_three);
            var file_four = input_one.files[0];
            fr_four = new FileReader();
            fr_four.readAsDataURL(file_four);
            fr_four.onload = receivedTextCorporate;
        }
    }
    function receivedTextCorporate() {
        $.ajax({
            type: "POST",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            'dataType': 'json',
            url: 'https://api.ifspay.ge/api/Register/Organization',
            contentType: "application/x-www-form-urlencoded",
            processData: false,
            data: JSON.stringify({
                "FirstName": $("#FirstNameCorporate").val(),
                "LastName": $("#LastNameCorporate").val(),
                "AddressLine": $("#AddressCorporate").val(),
                "Region": $("#RegionCorporate").val(),
                "Country": $("#CountryCorporate").val(),
                "City": $("#CityCorporate").val(),
                "PostalCode": $("#PostalCodeCorporate").val(),
                "Email": $("#EmailCorporate").val(),
                "PhoneNumber": $("#PhoneNumberCorporate").val(),
                "OrganizationName": $("#OrganizationCorporate").val(),
                "Position": $("#PositionCorporate").val(),
                "Image1": fr_one.result,
                "Image2": fr_two.result,
                "Image3": fr_three.result,
                "Image4": fr_four.result,
            }),
            success: function (result) {
                alert(result);
                window.location.reload();
            }
        });
    }
    function handleFileSelectPersonal(file_id_one, file_id_two) {
        if (!window.File || !window.FileReader || !window.FileList || !window.Blob) {
            alert('The File APIs are not fully supported in this browser.');
            return;
        }
        input_one = document.getElementById(file_id_one);
        input_two = document.getElementById(file_id_two);
        if (!input_one) {
            alert("Um, couldn't find the fileinput element.");
        }
        else if (!input_one.files) {
            alert("This browser doesn't seem to support the `files` property of file inputs.");
        }
        else if (!input_one.files[0]) {
            alert("Please select a file before clicking 'Load'");
        }
        else {
            var file_one = input_one.files[0];
            fr_one = new FileReader();
            fr_one.readAsDataURL(file_one);
            var file_two = input_two.files[0];
            fr_two = new FileReader();
            fr_two.readAsDataURL(file_two);
            fr_two.onload = receivedTextPersonal;
        }
    }
    function receivedTextPersonal() {
        $.ajax({
            type: "POST",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            'dataType': 'json',
            url: 'https://api.ifspay.ge/api/Register/Personal',
            contentType: "application/x-www-form-urlencoded",
            processData: false,
            data: JSON.stringify({
                "FirstName": $("#FirstNamePersonal").val(),
                "LastName": $("#LastNamePersonal").val(),
                "AddressLine": $("#AddressPersonal").val(),
                "Region": $("#RegionPersonal").val(),
                "Country": $("#CountryPersonal").val(),
                "City": $("#CityPersonal").val(),
                "PostalCode": $("#PostalCodePersonal").val(),
                "Email": $("#EmailPersonal").val(),
                "PhoneNumber": $("#PhoneNumberPersonal").val(),
                "Image1": fr_one.result,
                "Image2": fr_two.result,
            }),
            success: function (result) {
                alert(result);
                window.location.reload();
            }
        });
    }
