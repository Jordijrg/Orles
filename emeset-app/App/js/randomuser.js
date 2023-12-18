import $ from 'jquery';

function randomuser(userId) {
    jQuery("#userrandom").click(()=>{
      userrandom()
    })
    
    function userrandom() {
      return new Promise(function(resolve, reject) {
        $.ajax({
          url: 'https://randomuser.me/api/?results=1',
          dataType: 'json',
          success: function (data) {
            resolve(data);
            const namess = data.results[0].name.first;
            const surnames = data.results[0].name.last;
            const emails = data.results[0].email;
  
            $("#namess").val(namess);
            $("#surnames").val(surnames);
            $("#emails").val(emails);
          },
          error: function (error) {
            reject(error);
          }
        });
      });
    }
  }
export { randomuser };

