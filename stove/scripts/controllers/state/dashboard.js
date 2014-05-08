'use strict';

angular.module('webArchApp')
    .controller('dashboardCtrl', ['$scope',function ($scope) {



        var markers = [{
            coordinates: [-0.1262, 51.5002],
            attributes: { name: 'London' }
        }, {
            coordinates: [139.6823, 35.6785],
            attributes: { name: 'Tokyo' }
        }, {
            coordinates: [-77.0241, 38.8921],
            attributes: { name: 'Washington' }
        }];
        var i = 0;

        $('#chartVector').dxVectorMap({
            mapData: DevExpress.viz.map.sources.world,
            areaSettings: {
                palette: 'Harmony Light',
                paletteSize: 5,
                customize: function () {
                    return { paletteIndex: i++ % 5 };
                }
            },
            markers: markers,
            markerSettings: {
                customize: function (arg) {
                    return { text: arg.attributes.name };
                }
            }
        });
    }]);
