(function () {
    var weatherAPI = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-035?Authorization=CWB-5205EB6A-8913-45D0-BCC2-E54EB14AC8A0&format=JSON&locationName=%E9%95%B7%E6%B2%BB%E9%84%89&elementName=";
    $.getJSON(weatherAPI, {
        format: "json"
    })
        .done(function (data) {
            
            var eachTable = $('.each-table tbody');
            PoP12h = data.records.locations[0].location[0].weatherElement[0].time;
            Wx = data.records.locations[0].location[0].weatherElement[6].time;

            console.log(PoP12h);
            console.log(Wx);
            for (var i = 0; i < 6; i++) {
                startTime = PoP12h[i]["startTime"];
                endTime = PoP12h[i]["endTime"];
                PoP12h_value = PoP12h[i]["elementValue"][0]["value"];
                Wx_value = Wx[i]["elementValue"][0]["value"];
                console.log('開始時間：' + startTime + ' 結束時間：' + endTime + ' 降雨機率為：' + PoP12h_value + '%');
                console.log('開始時間：' + startTime + ' 結束時間：' + endTime + ' 天氣現象為：' + Wx_value);
                eachTable.append(
                    '<tr>' +
                    '<td>' + PoP12h[i]["startTime"] + '</td>' +
                    '<td>' + PoP12h[i]["endTime"] + '</td>' +
                    '<td>' + PoP12h[i]["elementValue"][0]["value"] + '%' + '</td>' +
                    '<td>' + Wx[i]["elementValue"][0]["value"] + '</td>' +
                    '</tr>');
            }
        });
})();

function getFlag(value, para) {
    let _code = "";
    let _img = "";
    let _para = (para.data) ? para.data.coord[0] : para;
    let _hour = _para.substring(6, 8);
    let wx = wxList.find(function (item) {
        return item.startTime.indexOf(_para) === 5
    });
    if (wx) {
        _code = wx.elementValue[1].value;
    }
    switch (_code) {
        case "01":
        case "24":
            if (_hour >= 18 || _hour < 6) {
                _img = HostbaseUrl + 'images/cwbChart/weather-icon-02.svg';  //月亮
            } else {
                _img= HostbaseUrl + 'images/cwbChart/weather-icon-01.svg';  //太陽
            }

            break;
        case "04":
            _img= HostbaseUrl + 'images/cwbChart/weather-icon-05.svg';  //雲
            break;
        case "19":
        case "21":
            if (_hour >= 18 || _hour < 6) {
                _img = HostbaseUrl + 'images/cwbChart/weather-icon-09.svg';  //晴天  日夜圖示不同 01 02
            } else {
                _img = HostbaseUrl + 'images/cwbChart/weather-icon-08.svg';  //晴天  日夜圖示不同 01 02
            }
            break;
        case "03":
        case "26":
            if (_hour >= 18 || _hour < 6) {
                _img = HostbaseUrl + 'images/cwbChart/weather-icon-03.svg';  //雲+月亮
            } else {
                _img = HostbaseUrl + 'images/cwbChart/weather-icon-04.svg';  //雲+太陽
            }
            break;

        case "08":
        case "09":
        case "12":
        case "20":
        case "23":
        case "29":
        case "30":
        case "31":
        case "32":
        case "37":
        case "38":
        case "15":
        case "16":
        case "22":
        case "33":
        case "34":
        case "35":
        case "36":
        case "41":
            _img = HostbaseUrl + 'images/cwbChart/weather-icon-06.svg'; //雨
            break;
        case "42":
            _img= HostbaseUrl + 'images/cwbChart/weather-icon-10.svg'; //下雪'
            break;
        case "02":
        case "25":
            if (_hour >= 18 || _hour < 6) {
                _img = HostbaseUrl + 'images/cwbChart/weather-icon-12.svg';  //月亮+雲
            } else {
                _img = HostbaseUrl + 'images/cwbChart/weather-icon-11.svg';  //太陽+雲
            }
            break;
        case "05":
        case "27":
            _img = HostbaseUrl + 'images/cwbChart/weather-icon-13.svg';  //雲+烏雲
            break;
        case "06":
            _img = HostbaseUrl + 'images/cwbChart/weather-icon-14.svg';  //烏雲+雲
            break;
        case "07":
        case "28":
            _img = HostbaseUrl + 'images/cwbChart/weather-icon-15.svg';  //烏雲
            break;
        case "10":
        case "13":
        case "17":
            _img = HostbaseUrl + 'images/cwbChart/weather-icon-16.svg';  //烏雲+雲雨
            break;
        case "18":
        case "14":
        case "39":
        case "11":
            _img = HostbaseUrl + 'images/cwbChart/weather-icon-17.svg';  //烏雲雨
            break;
        default:
            return "";
    }
    //console.log(_code);
    //console.log(_img);
    return _img;
}