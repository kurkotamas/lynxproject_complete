<!-- FOOTER -->
<footer class="page-footer bg-dark fixed-bottom py-2">
    <div class="container text-center">
        © 2019 lynxproject
        <a href="{{ route('terms_and_conditions') }}" target="_blank">Terms and Conditions</a>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

{{--DELETE USER SCRIPT--}}
<script>
    $(".deleteRecord").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: "users/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (){
                var row = $("th").filter(function() {
                    return $(this).text() == id;
                }).closest("tr");
                $(row).fadeOut("slow");
            }
        });
    });
</script>

{{--SEARCH USER--}}
<script>
    $(document).ready(function () {
        function fetch_customer_data(query = '') {
            $.ajax({
                url:"{{ route('home.action') }}",
                method: 'GET',
                data:{query:query},
                dataType:'json',
                success:function (data) {
                    $('tbody').html(data.table_data);
                }
            })
        }
        $(document).on('keyup', '#search_user', function () {
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>