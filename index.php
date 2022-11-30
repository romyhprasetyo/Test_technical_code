<html>
    <head>
        <style>
            input{
                margin-bottom: 15px;
                padding: 10px;
            }
            .error{
                color: red;
            }
            .success{
                color: green;
            }

            #result{
                margin: 2rem 0;
            }
        </style>
    </head>
    <body>

        <div>
            <input type="text" id="submission" placeholder="Input angka" name="submission"/>
        </div>
        <span class="err-message"></span>
        <br/>
        <div class="btn-group">
            <button class="btn-submit" data-id="segitiga" onclick="submission(this)">Generate segitiga</button>
            <button class="btn-submit" data-id="ganjil" onclick="submission(this)">Generate Bilangan Ganjil</button>
            <button class="btn-submit" data-id="prima" onclick="submission(this)">Generate Bilangan Prima</button>
        </div>

        <div id="result"></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
        <script>
            function submission(obj){
                var data_attr = obj.getAttribute('data-id');
                var value = parseInt($('#submission').val());
                $.ajax({
                    url : 'http://localhost/test-new/libs/NumberController.php?type='+data_attr+'&value='+value,
                    method : 'POST',
                    success: function (data, msg){
                        console.log(data);
                        $('#result').html(`${data}`);
                    }
                });
            }


            $('#submission').on('keyup', function (e){
                var regex = /^\d*[.]?\d*$/;
                var value = $(this).val();

                if(regex.test(value)){
                    $('.err-message').html('valid').removeClass('error').addClass('success');
                    $('.btn-submit').removeAttr('disabled');
                }else if(!regex.test(value)){
                    $('.err-message').html('not valid').addClass('error').removeClass('success');
                    $('.btn-submit').attr('disabled', true);
                }
            });
        </script>
    </body>
</html>