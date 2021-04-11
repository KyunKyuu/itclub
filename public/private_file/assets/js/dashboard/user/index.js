$(document).ready(function() {
        activity();
        browserUser();
        chartQuery(1);
})

function browserUser() {
    let html = ``
    let browser = ''
    let name = ''
    $.ajax({
        url:'/api/v1/user/activity/browser',
        success:res=>{
            res.values.forEach(value=>{
                if (value.browser.match(/Explorer/)){
                    browser = 'Internet Explorer';
                    name = 'internet-explorer';
                }
                else if (value.browser.match( /Firefox/)){
                    browser = 'Mozilla Firefox';
                    name = 'firefox';
                }
                else if (value.browser.match(/Chrome/)){
                    browser = 'Google Chrome';
                    name = 'chrome';
                }
                else if (value.browser.match(/Opera Mini/)){
                    browser = "Opera Mini";
                    name = 'opera';
                }
                else if (value.browser.match(/Opera/)){
                    browser = "Opera";
                    name = 'opera';
                }
                else if (value.browser.match(/Safari/)){
                    browser = "Safari";
                    name = 'safari';
                }
                html += `
                    <li class="media">
                    <div class="browser browser-${name} mr-3" alt="product"></div>
                    <div class="media-body">
                        <div class="media-title">${browser}</div>
                        <div class="">
                            <div class="font-weight-600 text-muted text-small">${value.data} Akses</div>
                        </div>
                    </div>
                </li>
                `
            })
            $('#BrowserUser').html(html)
        },
        error:err=>console.log(err),
    })


}

function activity(parm = 'FALSE') {
    $.ajax({
        url:'/api/v1/user/activity/all',
        success:res=>{
            let val = res.values
            let insert = val.insert
            let update = val.update
            let hapus = val.delete
            let recovery = val.recovery
            let unknown = val.unknown
            let all = val.all
            $('#activityInsert').text(insert)
            $('#activityUpdate').text(update)
            $('#activityDelete').text(hapus)
            $('#activityRecovery').text(recovery)
            $('#activityUnknown').text(unknown)
            $('#activityTotal').text(all)
            chartQuery({unknown:unknown,val:val})

        },
        error:err=>console.log(err),
    })
}

function chartQuery(values) {
    var statistics_chart = document.getElementById("myChart").getContext('2d');

    var myChart = new Chart(statistics_chart, {
    type: 'bar',
    data: {
        labels: ['Insert', 'Update', 'Delete', 'Recovery', 'Unknown'],
        datasets: [{
        label: 'Statistics',
        data: [values.val.insert, values.val.update, values.val.delete, values.val.recovery, values.unknown],
        borderWidth: 1,
        borderColor: '#fff',
        backgroundColor: ['#47C363', '#FFC107', '#FC544B', '#7DC2F5', '#d0d0d0'],
        pointBackgroundColor: '#fff',
        pointBorderColor: '#6777ef',
        pointRadius: 4
        }],
    },
    options: {
        legend: {
        display: false
        },
        scales: {
        yAxes: [{
            gridLines: {
            display: false,
            drawBorder: false,
            },
            ticks: {
            stepSize: 5
            }
        }],
        xAxes: [{
            gridLines: {
            color: '#fbfbfb',
            lineWidth: 2,
            display:false
            }
        }]
        },
    }
    });
}

