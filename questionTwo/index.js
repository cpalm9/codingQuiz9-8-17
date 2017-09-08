const http = require('http');
const url = 'http://gmc.lingotek.com/language';
http.get(url, (res) => {
    var body = '';

    res.on('data', (chunk) => {
        body += chunk;
    }).on('end', () => {
        if (res.statusCode === 200){
            var response = JSON.parse(body);
            for (var key in response){
                var val = response[key];
                console.log(response[key].language)
            }
        } else { console.log(res.statusCode)}
    });
})