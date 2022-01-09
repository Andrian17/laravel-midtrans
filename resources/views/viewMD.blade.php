<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="#" id="formMD" class="my-5">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jenis Pembayaran</label>
                        <input type="text" class="form-control" id="jenis_pembayaran" name="jenis_pembayaran">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nominal</label>
                        <input type="text" class="form-control" id="nominal" name="nominal">
                    </div>
                    <button type="submit" class="btn btn-primary">simpan</button>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    {{-- js jquery --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    {{-- setting js untuk snap midtrans --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client') }}">
    </script>

    <script>
        $("#formMD").submit(function(event) {
            event.preventDefault();
            $.post("/api/pay", {
                _method: 'POST',
                _token: '{{ csrf_token() }}',
                nama: $('input#nama').val(),
                email: $('input#email').val(),
                jenis_pembayaran: $('input#jenis_pembayaran').val(),
                nominal: $('input#nominal').val(),
            },
            function (data, status) {
                console.log(data);
                snap.pay(data.snap_token, {
                    // Optional
                    onSuccess: function (result) {
                        location.reload();
                    },
                    // Optional
                    onPending: function (result) {
                        location.reload();
                    },
                    // Optional
                    onError: function (result) {
                        location.reload();
                    }
                });
                return false;
            });
        })
    </script>

  </body>
</html>
