<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->


    <style>
    body {
        font-family: 'Nunito', sans-serif;

    }

    #corpo {
        justify-content: center;
        align-items: center;
        '
        display: flex;
        flex-direction: row;
        width: 80%;
        margin-left: 200px;
        margin-top: 100px;


    }

    #table {
        background: #fff;

    }

    p {
        font-weight: bold;
        font-size: 20px;
    }
    </style>
</head>

<body class="antialiased">
    <div id='corpo'>
        <button type="button" id="newOrder" class="btn btn-primary">Open New Order</button>
        <br>
        <br>
        <div id='table'>
            <table id="tableOrder" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Contact</th>
                        <th>Agency</th>
                        <th>Company</th>
                        <th>Deadline</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordeis as $order)

                    <tr>
                        <td>{{$order['id']}}</td>
                        <td>{{$order['category']}}</td>
                        <td>{{$order['contact_name']}} {{$order['contact_phone']}}</td>
                        <td>{{$order['agency']}}</td>
                        <td>{{$order['company']}}</td>
                        <td>{{$order['deadline']}}</td>

                    </tr>

                    @endforeach


                </tbody>

            </table>
        </div>
    </div>

    <!-- Modal -->

    <!-- Modal de Cadastro -->
    <div id="ModalLoginForm" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">New Orden</h1>
                </div>
                <div class="modal-body">
                    <form role="form" method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Contact Name</label>
                            <div>
                                <input required type="text" class="form-control input-lg" name="contact_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Contact Phone</label>
                            <div>
                                <input type="tel" maxlength="14" require data-js="phone" class="form-control input-lg"
                                    name="contact_phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Real Estate Agency</label>
                            <div>
                                <input required type="text" class="form-control input-lg" name="agency">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Company</label>
                            <div>
                                <input required type="text" class="form-control input-lg" name="company">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Select the order category</label>
                            <div>
                                <select required class="form-control input-lg" name="category">
                                    <option value=""></option>

                                    @foreach ($categoria as $categorias)
                                    <option value="{{$categorias['id']}}">{{$categorias['category']}}</option>

                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Deadline</label>
                            <div>
                                <input required type="date" class="form-control input-lg" name="deadline">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Order Description</label>
                            <div>
                                <textarea class="form-control input-lg" required name="description" cols="30"
                                    rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-success">Save</button>

                            </div>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- /.modal -->
    <div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="OrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="OrderModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>Contact Name : <p id='name'></p>
                    </div>
                    <div>Contact Phone <p id='phone'></p>
                    </div>
                    <div>Real Estate Agency <p id='agency'></p>
                    </div>
                    <div>Company <p id='company'></p>
                    </div>
                    <div>Category<p id='category'></p>
                    </div>
                    <div>Deadline<p id='deadline'></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js
"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js
"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script>
var myModal = new bootstrap.Modal(document.getElementById("OrderModal"), {});
var cadastroModal = new bootstrap.Modal(document.getElementById("ModalLoginForm"), {});


$(document).ready(function() {

    //FORMATAÇÃO DO TELEFONE

    const formato = {

        phone(value) {

            return value

                .replace(/\D/g, '')

                .replace(/(\d{2})(\d)/, '($1)$2')

                .replace(/(\d{4})(\d)/, '$1-$2')

                .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')

                .replace(/(-\d{4})\d+?$/, '$1')

        }

    }
    document.querySelectorAll('input').forEach(($input) => {

        const field = $input.dataset.js

        $input.addEventListener('input', (e) => {

            e.target.value = formato[field](e.target.value)

        }, false)

    })

    //Abrir o Modal de Cadastro

    $('#tableOrder').DataTable();

    var table = $('#tableOrder').DataTable();
    $('#newOrder').on('click', function() {
        cadastroModal.show();
    })

    //Abrir o Modal de Detalhes dos Pedidos

    $('#tableOrder tbody').on('click', 'tr', function() {

        var data = table.row(this).data();
        $('#name').html(data[2].split(' ')[0])
        $('#phone').html(data[2].split(' ')[1])
        $('#agency').html(data[3])
        $('#company').html(data[4])
        $('#category').html(data[1])
        $('#deadline').html(data[5])


        myModal.show();

    });
});
</script>

</html>