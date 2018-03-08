var Log = {
    e: function (t, s) {
        console.log('%c' + t + ': %c' + s, 'color: #ff0000; font-weight: bold', 'color: #ff0000');
    },
    d: function (t, s) {
        console.log('%c' + t + ': %c' + s, 'color: #000000; font-weight: bold', 'color: #000000');
    },
    c: function (t, s, c) {
        console.log('%c' + t + ': %c' + s, 'color: ' + c + '; font-weight: bold', 'color: ' + c);
    },
    m: console.log
};

var GeoService = {
    addMarker: function (map, id, coordinates, iconUrl, size, anchor, options, callback) {
        var _self = this;

        var el = new Image();
        el.id = "marker-" + id;
        el.className = 'marker-styles';

        el.onload = function () {
            if (size) {
                var ratio = el.width / el.height;
                if (size.width) el.width = size.width;
                if (size.height) el.height = size.height;
                if (!size.width) {
                    el.width = size.height * ratio;
                }
                if (!size.height) {
                    el.height = size.width / ratio;
                }
            }
            var popup = new mapboxgl.Popup({
                anchor: "top"
            });
            if (options && options.get_address) {
                _self.geocoding(coordinates[1], coordinates[0]).then(function (response) {
                    if (response.data && response.data.success) {
                        popup.setHTML("<p style='padding: 5px; margin: 0;'>" + response.data.result + "</p>");
                    }
                });
            }
            if (options && options.text) {
                popup.setHTML("<p style='padding: 5px; margin: 0;'>" + options.text + "</p>");
            }

            var offset = [-(el.width * (anchor ? anchor.u : 0.5)), -(el.height * (anchor ? anchor.v : 0.5))]
            if (!iconUrl && !anchor) {
                offset = [-el.width * 0.5, -el.height * 0.92];
            }
            var marker = new mapboxgl.Marker(el, {offset: offset})
                .setLngLat(coordinates)
                .setPopup(popup)
                .addTo(map);
            if (callback) callback(marker);
        };

        el.onerror = function () {
            //Do some things!
        };
        if (iconUrl) el.src = iconUrl;
        else el.src = 'http://api.goong.io/images/map/mk_point_pin.png';
    },
    within_box: function (options, callback) {
        return $.ajax({
            url: "https://api.foursquare.com/v2/search/recommendations",
            method: "GET",
            data: options,
            success: function (res) {
                if (callback) callback(res);
            }
        });
    },
    get_tips: function (marker_id, options, callback) {
        return $.ajax({
            url: "https://api.foursquare.com/v2/venues/"+marker_id+"/tips",
            method: "GET",
            data: options,
            success: function (res) {
                if (callback) callback(res);
            }
        });
    },
    get_photos: function (marker_id, options, callback) {
        return $.ajax({
            url: "https://api.foursquare.com/v2/venues/"+marker_id+"/photos",
            method: "GET",
            data: options,
            success: function (res) {
                if (callback) callback(res);
            }
        });
    }
};

function LocDau(str) {
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    return str;
}

var Crawlwer = {
    mapView: null,
    mode: "FIND",
    listMarkers: [],
    listData: {},
    code: "SUGGESTION",//"FOOD",
    category: "Suggestion",//"Food",
    query: "",
    importLibs: function (callback) {
        var s = document.createElement("script");
        s.src = "https://api.mapbox.com/mapbox-gl-js/v0.23.0/mapbox-gl.js";
        $("head").append(s);

        s = document.createElement("script");
        s.src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js";
        $("head").append(s);

        s = document.createElement("script");
        s.src = chrome.extension.getURL("sweetalert.min.js");
        $("head").append(s);

        s = document.createElement("script");
        s.src = chrome.extension.getURL("script.js");
        $("head").append(s);

        s = document.createElement("script");
        s.src = chrome.extension.getURL("jquery-3.1.0.min.js");
        $("head").append(s);
        s = document.createElement("script");
        s.src = chrome.extension.getURL("xlsx/FileSaver.js");
        $("head").append(s);

        s = document.createElement("script");
        s.src = chrome.extension.getURL("xlsx/Workbook.js");
        $("head").append(s);

        s = document.createElement("script");
        s.src = chrome.extension.getURL("xlsx/xlsx.full.min.js");
        $("head").append(s);

        var l = document.createElement("link");
        l.rel = "stylesheet";
        l.href = "https://api.mapbox.com/mapbox-gl-js/v0.23.0/mapbox-gl.css";
        $("head").append(l)

        var l = document.createElement("link");
        l.rel = "stylesheet";
        l.href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css";
        $("head").append(l)

        l = document.createElement("link");
        l.rel = "stylesheet";
        l.href = chrome.extension.getURL("css/sweetalert.css");
        $("head").append(l)

        setTimeout(function () {
            s = document.createElement("script");
            s.src = chrome.extension.getURL("load.js");
            $("head").append(s);
        }, 1000);

        Log.c("import", "done!", "#0000FF");
    },
    init: function () {
        var _self = this;

        $("body").append("<div id='mapbox_view' style='position: absolute; width: 100%; height: 100%; background: #DDDDDD; z-index: 9998; top: 0;'>"
            + "</div>"
                //+"<button class='btn btn-warning' style='position: absolute; width: auto; height: 40px; bottom: 80px; left: 20px; z-index: 9999;' onclick='Crawlwer.toogleMode(event);'>SEARCH Mode</button>"
            + "<button class='btn btn-default' style='position: absolute; width: 100px; height: 40px; bottom: 20px; left: 20px; z-index: 9999;' onclick='Crawlwer.clearListData();'>Clear Cache</button>"
            + "<button class='btn btn-success' style='position: absolute; width: 100px; height: 40px; bottom: 20px; left: 140px; z-index: 9999;' onclick='Crawlwer.exportData();'>Export Data</button>");

        //$("body").append("<select id='select_box_type' class='form-control' style='position: absolute; z-index: 9999; top: 20px; left: 20px; width: 30%;' value='FOOD'>"
        //    + "<option value='FOOD'>Food</option>"
        //    + "<option value='CAFE'>Café</option>"
        //    + "<option value='NIGHTLIFE'>Nightlife</option>"
        //    + "<option value='FUN'>Fun</option>"
        //    + "<option value='SHOPPING'>Shopping</option>"
        //    + "</select>");

        //$("body").append("<input id='input_box_search' class='form-control' style='position: absolute; z-index: 9999; top: 20px; left: 20px; width: 30%; display: none;' placeholder='Từ khoá tìm kiếm'/>");

        //$("#select_box_type").change(function () {
        //    _self.code = $("#select_box_type").val();
        //    _self.category = _self.cateOfCode($("#select_box_type").val());
        //});
        //
        //$("#input_box_search").change(function() {
        //  _self.removeListMarkers();
        //  _self.query = $("#input_box_search").val();
        //});
        this.addMapView();
    },
    //cateOfCode: function (code) {
    //    if (code == "FOOD") return "Food";
    //    if (code == "CAFE") return "Coffee";
    //    if (code == "NIGHTLIFE") return "Nightlife";
    //    if (code == "FUN") return "Fun";
    //    if (code == "SHOPPING") return "Shopping";
    //},
    addMapView: function () {
        var _self = this;
        mapboxgl.accessToken = 'pk.eyJ1IjoiZ29vbmciLCJhIjoiY2lxdnExbXp3MDAyMmZwbWdnM3hsMHJhOCJ9.yv3sSCjycKKfBvZSLuLg6w';
        this.mapView = new mapboxgl.Map({
            container: 'mapbox_view',
            style: 'mapbox://styles/goong/ciqvq35t20000cxm6ns9ucndc',
            minZoom: 5,
            center: [105.811417, 20.993776],
            zoom: 12
        });
        this.mapView.on("load", function () {
            _self.mapView.addLayer({
                'id': '3d-buildings',
                'source': 'composite',
                'source-layer': 'VN_Building',
                'filter': ['==', 'extrude', 'true'],
                'type': 'fill-extrusion',
                'minzoom': 15,
                'paint': {
                    'fill-extrusion-color': '#aaa',
                    'fill-extrusion-height': {
                        'type': 'identity',
                        'property': 'height'
                    },
                    'fill-extrusion-base': {
                        'type': 'identity',
                        'property': 'min_height'
                    },
                    'fill-extrusion-opacity': .6
                }
            });
        });

        this.mapView.on("zoom", function () {
            if (_self.movingTimeout) clearTimeout(_self.movingTimeout);
            _self.movingTimeout = setTimeout(function () {
                _self.getMarkers();
            }, 200);
        });
        this.mapView.on("move", function () {
            if (_self.movingTimeout) clearTimeout(_self.movingTimeout);
            _self.movingTimeout = setTimeout(function () {
                _self.getMarkers();
            }, 200);
        });
    },
    //toogleMode: function(e){
    //  this.clearListData();
    //  if(this.mode == "FIND"){
    //    this.mode = "SEARCH";
    //    $(e.target).text("FIND mode");
    //    $("#input_box_search").show();
    //    $("#select_box_type").hide();
    //  }
    //  else{
    //    this.mode = "FIND";
    //    $(e.target).text("SEARCH mode");
    //    $("#input_box_search").hide();
    //    $("#select_box_type").show();
    //  }
    //  Log.m(this.mode);
    //},
    removeListMarkers: function () {
        for (var i = 0; i < this.listMarkers.length; i++) {
            this.listMarkers[i].remove();
        }
        this.listMarkers = [];
    },
    clearListData: function () {
        this.removeListMarkers();
        this.listData = {};
    },
    exportData: function () {
        var _self = this;
        var data = [];
        var dataRow = [
            {
                v: "FID"
            },
            {
                v: "POI_VN"
            },
            {
                v: "GEN_TYPE"
            },
            {
                v: "ADDRESS"
            },
            {
                v: "PHONE"
            },
            {
                v: "WEB"
            },
            {
                v: "FACEBOOK"
            },
            {
                v: "RATING"
            },
            {
                v: "RATING_COUNT"
            },
            {
                v: "MAIL"
            },
            {
                v: "COMMENTS"
            },
            {
                v: "CATEGORIES"
            },
            {
                v: "IMGS"
            },
            {
                v: "LON"
            },
            {
                v: "LAT"
            }
        ];
        data.push(dataRow);

        var array = [];
        var count = 0;
        var len = Object.keys(this.listData).length;
        var type_name = null;
        $.each(this.listData, function (id, details) {
            //if(!details.title) {
            //  //if(_self.mode == "SEARCH"){
            //  //  GeoService.get_details({
            //  //    id: details.hash,
            //  //    full: true,
            //  //    reqid: details.reqid
            //  //  }, function(res){
            //  //    if(res){
            //  //      _self.listData[details.hash] = res;
            //  //      _self.mapView.flyTo({
            //  //        center: [
            //  //        details.gps.longitude,
            //  //        details.gps.latitude
            //  //        ],
            //  //        zoom: 18
            //  //      });
            //  //    }
            //  //  });
            //  //}
            //  //else{
            //    _self.mapView.flyTo({
            //      center: [
            //      details.gps.longitude,
            //      details.gps.latitude
            //      ],
            //      zoom: 18
            //    });
            //  //}
            //  swal("Bad job!", "Thiếu dữ liệu để export!", "warning");
            //  return false;
            //}
            var dataRow = [
                {
                    v: details.id
                },
                {
                    v: details.venue.name
                },
                {
                    v: details.type_code
                },
                {
                    v: details.venue.location.formattedAddress ? details.venue.location.formattedAddress.toString() : ""
                },
                {
                    v: ""//details.phone
                },
                {
                    v: ""//details.url
                },
                {
                    v: ""//details.facebook
                },
                {
                    v: details.venue.rating
                },
                {
                    v: details.venue.ratingSignals
                },
                {
                    v: ""//details.email
                },
                {
                    v: JSON.stringify(details.snippets)
                },
                {
                    v: JSON.stringify(details.venue.categories)
                },
                {
                    v: JSON.stringify(details.photo)
                },
                {
                    v: details.venue.location.lng
                },
                {
                    v: details.venue.location.lat
                }
            ];
            if (type_name == null) type_name = details.type_code;
            else {
                if (type_name.indexOf(details.type_code) < 0) {
                    type_name += "_" + details.type_code;
                }
            }
            data.push(dataRow);
            count++;
            if (count >= len) {
                var date = new Date();
                var day = date.getDate();
                var monthIndex = date.getMonth() + 1;
                var year = date.getFullYear();
                var name = type_name + "_" + day + "_" + monthIndex + "_" + year;

                var workbook = new Workbook()
                    .addRowsToSheet(type_name, data).finalize();
                var wbout = XLSX.write(workbook, {
                    bookType: 'xlsx',
                    bookSST: false,
                    type: 'binary',
                    defaultCellStyle: {font: {name: 'Arial', sz: '12'}}
                });
                saveAs(new Blob([_self.s2ab(wbout)], {type: "application/octet-stream"}), name + ".xlsx")
            }
        });
    },
    getMarkers: function () {
        var _self = this;
        var zoom = this.mapView.getZoom();
        var bounds = this.mapView.getBounds();
        var data = {};
        data.sw = bounds._sw.lat + "," + bounds._sw.lng;
        data.ne = bounds._ne.lat + "," + bounds._ne.lng;
        //data.query = this.category;
        data.limit = 100;
        data.itent = "bestnearby";
        data.mode = "mapRequery";
        data.oauth_token = window.location.hash.substr(1).split("=")[1];
        data.v = "20161230";
        data.m = "foursquare";

        if (data != null) {
            GeoService.within_box(data, function (res) {
                // if(_self.mode == "SEARCH") _self.removeListMarkers();
                _self.removeListMarkers();
                if (res) {
                    $.each(res.response.group.results, function (position, marker_details) {
                        var valid_id = marker_details.venue.id;
                        _self.listData[valid_id] = marker_details;
                        _self.listData[valid_id].id = valid_id;
                        _self.listData[valid_id].type_code = _self.code;

                        //GeoService.get_photos(_self.listData[valid_id].id, {
                        //    oauth_token: window.location.hash.substr(1).split("=")[1],
                        //    v: 20161230
                        //}, function(response){
                        //    console.log(response);
                        //});
                        //
                        //GeoService.get_tips(_self.listData[valid_id].id, {
                        //    oauth_token: window.location.hash.substr(1).split("=")[1],
                        //    v: 20161230
                        //}, function(response){
                        //    console.log(response);
                        //});

                        GeoService.addMarker(
                            _self.mapView,
                            _self.listData[valid_id].id,
                            [_self.listData[valid_id].venue.location.lng, _self.listData[valid_id].venue.location.lat],
                            "http://api.goong.io/images/map/mk_point_pin.png",
                            {
                                width: 30
                            },
                            {
                                u: 0.5,
                                v: 0.92
                            },
                            {
                                get_address: false,
                                text: _self.listData[valid_id].venue.name
                            }, function (marker) {
                                _self.listMarkers.push(marker);
                            });
                    })
                }
            });
        }
    },
    s2ab: function (s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i = 0; i != s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
    }
};