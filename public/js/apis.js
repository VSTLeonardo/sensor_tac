// $(document).ready(function() {
//     getAllForSub()
// });

// function getAllForSub()
// {
//     var sub = selected();
//     var iteration
//     $.ajax({
//         method: 'POST',
//         url: 'http://127.0.0.1:8000/api/v1/getAllRegisters',
//         data: {"sub": sub},
//         async: true,
//         success: function(data)
//         {
//             var response = JSON.parse(data);
//             response.forEach(function(row)
//             {
//                  iteration = row
//             })
//             console.log(iteration)
//         }
//     })
// }

// function selected()
// {   
//     var path = window.location.pathname;
//     var url =  path.replace("/medicoes/", "");
//     return url;
// }

