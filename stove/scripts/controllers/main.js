'use strict';

angular.module('webArchApp')
    .controller('MainCtrl', function ($scope) {

        $scope.classMenu = "open-menu";
        $scope.classContent = "clear-on";
        $scope.classMenuContent = "menu-on";

        $scope.menuOpen = function () {
            if ($scope.classMenu === "open-menu")
                $scope.classMenu = "close-menu";
            else
                $scope.classMenu = "open-menu";

            if ($scope.classContent === "clear-on")
                $scope.classContent = "clear-off";
            else
                $scope.classContent = "clear-on";

            if ($scope.classMenuContent === "menu-on")
                $scope.classMenuContent = "menu-off";
            else
                $scope.classMenuContent = "menu-on";
        };




        $scope.scaleMap = function () {
            var styleScaleMap = document.getElementById('img-content');
            styleScaleMap.style.webkitTransform = 'translate3d(-600px, 0, 0)';
            styleScaleMap.style.oTransform = 'translate3d(-600px, 0, 0)';
            styleScaleMap.style.msTransform = 'translate3d(-600px, 0, 0)';
            styleScaleMap.style.mozTransform = 'translate3d(-600px, 0, 0)';
            console.log('ok done : ',styleScaleMap);
        }

    });
