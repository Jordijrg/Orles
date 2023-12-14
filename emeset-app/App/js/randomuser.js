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
            const names = data.results[0].name.first;
            const surname = data.results[0].name.last;
            const email = data.results[0].email;
  
            $("#names").val(names);
            $("#surname").val(surname);
            $("#email").val(email);
          },
          error: function (error) {
            reject(error);
          }
        });
      });
    }
  }
export { randomuser };

