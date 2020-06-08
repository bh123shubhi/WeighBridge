'use strict';
angular.module('app')
        .run(
                [
                    '$rootScope', '$state', '$stateParams', '$http', '$location', '$interval',
                    function ($rootScope, $state, $stateParams, $http, $location, $interval) {
                        $rootScope.$state = $state;
                        $rootScope.$stateParams = $stateParams;
                        $rootScope.loader = true;


                    }
                ]
                )
        .config(
                [
                    '$stateProvider', '$urlRouterProvider',
                    function ($stateProvider, $urlRouterProvider) {
                        $urlRouterProvider.otherwise("/");
                        $stateProvider
                                .state('app', {
                                    abstract: true,
                                    url: '/app',
                                    templateUrl: baseuRL + 'dashboard',
                                    resolve: {
                                        deps: [
                                            '$ocLazyLoad',
                                            function ($ocLazyLoad) {

                                                return $ocLazyLoad.load({
                                                    serie: true,
                                                    files: [
                                                        "global_assets/js/render_data_dashboard.js",
                                                        "global_assets/js/plugins/visualization/d3/d3.min.js",
                                                        "global_assets/js/plugins/visualization/d3/d3_tooltip.js",
                                                        "global_assets/js/plugins/forms/styling/switchery.min.js",
                                                        "global_assets/js/plugins/ui/moment/moment.min.js",
                                                        "global_assets/js/plugins/pickers/daterangepicker.js",
                                                        "global_assets/js/plugins/ui/perfect_scrollbar.min.js",
                                                        "assets/js/app.js",
                                                        "global_assets/js/demo_pages/layout_fixed_sidebar_custom.js",
                                                        "global_assets/js/demo_pages/dashboard.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/sparklines.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/lines.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/areas.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/donuts.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/bars.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/progress.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/pies.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/bullets.js",
                                                    ]
                                                });

                                            }
                                        ]
                                    }
                                })
                                .state('app.dashboard', {
                                    url: '/dashboard',
                                    templateUrl: baseuRL + '/dashboard',
                                    ncyBreadcrumb: {
                                        label: 'Vehicle-Dashboard'
                                    },
                                    resolve: {
                                        deps: [
                                            '$ocLazyLoad',
                                            function ($ocLazyLoad) {

                                                return $ocLazyLoad.load({
                                                    serie: true,
                                                    files: [
                                                        "global_assets/js/plugins/visualization/d3/d3.min.js",
                                                        "global_assets/js/plugins/visualization/d3/d3_tooltip.js",
                                                        "global_assets/js/plugins/forms/styling/switchery.min.js",
                                                        "global_assets/js/plugins/ui/moment/moment.min.js",
                                                        "global_assets/js/plugins/pickers/daterangepicker.js",
                                                        "global_assets/js/plugins/ui/perfect_scrollbar.min.js",
                                                        "assets/js/app.js",
                                                        "global_assets/js/demo_pages/layout_fixed_sidebar_custom.js",
                                                        "global_assets/js/demo_pages/dashboard.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/sparklines.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/lines.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/areas.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/donuts.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/bars.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/progress.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/pies.js",
                                                        "global_assets/js/demo_charts/pages/dashboard/light/bullets.js",
                                                        "global_assets/js/render_data_dashboard.js"
                                                    ]
                                                });

                                            }
                                        ]
                                    }
                                })
//                                .state('operatorlist', {
//                                    url: '/operatorlist',
//                                    templateUrl: baseuRL + 'operatorlist',
//                                    ncyBreadcrumb: {
//                                        label: 'Operator List'
//                                    },
//                                    resolve: {
//                                        deps: [
//                                            '$ocLazyLoad',
//                                            function ($ocLazyLoad) {
//
//                                                return $ocLazyLoad.load({
//                                                    serie: true,
//                                                    files: [
//                                                        'Assets/js/controller/render_data_operator.js',
//                                                        "global_assets/js/plugins/tables/datatables/datatables.min.js",
//                                                        "global_assets/js/plugins/tables/datatables/extensions/buttons.min.js",
//                                                        "global_assets/js/plugins/forms/selects/select2.min.js",
//                                                        "global_assets/js/plugins/ui/perfect_scrollbar.min.js",
//                                                        "global_assets/js/plugins/forms/validation/validate.min.js",
//                                                        "assets/js/app.js",
//                                                        "global_assets/js/demo_pages/datatables_extension_colvis.js",
//                                                        "global_assets/js/demo_pages/layout_fixed_sidebar_custom.js",
//                                                    ]
//                                                });
//
//                                            }
//                                        ]
//                                    }
//                                })

                    }
                ]
                );
