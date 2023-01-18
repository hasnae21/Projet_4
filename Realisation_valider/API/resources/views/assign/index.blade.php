@extends('master')
@section('index_assign')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('message.btn_assign') }}</h1>
                    </div>
                    {{-- <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                </ol>
                    </div> --}}
                </div>
            </div>
        </section>

        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">

                    <form action="{{ route('form') }}" method="POST">
                        @csrf

                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2>{{ __('message.message_prf') }}</h2>
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex flex-end p-3">

                                {{-- select Brief --}}
                                <select class="custom-select" id="select" name="select">
                                    <option value="">{{ __('message.select_brief') }}:</option>
                                    @foreach ($brief as $value)
                                        <option value="{{ $value->id }}">
                                            {{ $value->Nom_du_brief }}
                                        </option>
                                    @endforeach
                                </select>
                                {{-- <span id="id_input"></span> --}}
                                {{--  --}}

                                {{-- filter/Groupe --}}
                                <select class="btn btn-dark dropdown-toggle" name="filter" id="filter">
                                    <option value="">{{ __('message.all_groups') }}</option>
                                    @foreach ($promo as $value)
                                        <option value="{{ $value->id }}">{{ $value->Nom_groupe }}</option>
                                    @endforeach
                                </select>
                                {{--  --}}
                            </div>
                        </div>

                        <!-- message de validation -->
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <!--  -->
                        <!-- message d'erreur -->
                        @if (Session::has('fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        <!--  -->

                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-primary">
                                <th>
                                    <div class="form-check for-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                            onclick='checkUncheck(this)'>
                                        <label class="form-check-label"
                                            for="flexSwitchCheckDefault">{{ __('message.checkbox_tous') }}</label>
                                    </div>
                                </th>
                            </thead>
                            <tbody id="table1">

                                @if (count($apprenants) > 0)
                                    @foreach ($apprenants as $student)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $student->id }}" id="defaultCheck" name="check[]">
                                                    <label class="form-check-label" for="defaultCheck">
                                                        &nbsp;{{ $student->Nom }}&nbsp;{{ $student->Prenom }}
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>Aucun apprenant</td>
                                    </tr>
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex justify-content-start">
                                                <button type="submit" class="btn btn-outline-primary">
                                                    {{ __('message.btn_affecter') }}
                                                </button>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                {{-- {!! $apprenants->links() !!} --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>

    <script type="text/javascript">
        $('#filter').on('change', function() {
            $value = $(this).val();

            $.ajax({
                type: 'get',
                url: '{{ route('filter_par_group') }}',
                data: {
                    'filter': $value
                },

                success: function(data) {

                    console.log(data);
                    var apprenants = data.apprenants;
                    var html = '';

                    if (apprenants.length > 0) {
                        for (let i = 0; i < apprenants.length; i++) {
                            html +=
                                '<tr>\
                                    <td>\
                                    <div class="form-check">\
                                    <input class="form-check-input" type="checkbox" value="' + apprenants[i]['id'] + '" id="defaultCheck" name="check[]">\
                                    <label class="form-check-label" for="defaultCheck1">\
                                        ' + apprenants[i]['Nom'] + ' &nbsp; ' + apprenants[i]['Prenom'] + '\
                                    </label>\
                                    </div>\
                                    </td>\
                                </tr>';
                        }
                    } else {
                        html += '<tr>\
                                    <td>Aucun apprenant</td>\
                                </tr>';
                    }
                    $('#table1').html(html);
                }
            });
        })

        // $('#select').on('change', function() {
        //     $value = $(this).val();
        //     document.getElementById("id_input").innerHTML = $value;
        // })


        function checkUncheck(main) {
            all = document.getElementsByName("check[]");
            for (var a = 0; a < all.length; a++) {
                all[a].checked = main.checked;
            }
        }
    </script>
@endsection
