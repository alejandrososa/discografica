/**
 * Created by alejandro.sosa on 29/05/2016.
 */

app.controller('albumesController', function($scope, $http, API_URL, REST_ALBUM) {
    //retrieve albumes listing from API
    console.info(API_URL + REST_ALBUM);
    $http.get(API_URL + REST_ALBUM)
        .success(function(response) {
            $scope.albumes = response;
        });


    $scope.form_button = "Crear";

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Crear nuevo Album";
                $scope.form_button = "Crear";
                break;
            case 'edit':
                $scope.form_title = "Album info";
                $scope.form_button = "Guardar";
                $scope.id = id;
                $http.get(API_URL + REST_ALBUM + '/' + id)
                    .success(function(response) {
                        console.log(response);
                        $scope.album = response;
                    });
                break;
            default:
                break;
        }
        console.log(id);
        $('#modal1').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + REST_ALBUM;

        //append album id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        console.info($scope.album);

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.album),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');

        if (isConfirmDelete) {
            console.info(API_URL + REST_ALBUM + '/' + id);
            $http({
                method: 'DELETE',
                url: API_URL + REST_ALBUM + '/' + id
            }).
            success(function(data) {
                console.log(data);
                location.reload();
            }).
            error(function(data) {
                console.log(data);
                alert('Unable to delete');
            });
        } else {
            return false;
        }
    }
});