(function () {
    var weatherAPI = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-035?Authorization=CWB-5205EB6A-8913-45D0-BCC2-E54EB14AC8A0&format=JSON&locationName=%E9%95%B7%E6%B2%BB%E9%84%89&elementName=";
    $.getJSON(weatherAPI, {
        format: "json"
    })
        .done(function (data) {
            const weatherTypes = {
                isThunderstorm: [15, 16, 17, 18, 21, 22, 33, 34, 35, 36, 41]
            };

            const weatherIcons = {
                day: {
                    isThunderstorm: <DayThunderstorm />
                }
            };

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