@extends('master')
@section('create')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{(__('message.btn_apprenant'))}}</h1>
          </div>
        </div>
      </div>
    </section>

    <body>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
    <div class="col-md-6 col-lg-6">
                <form class="card" action="{{ route('apprenant.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <h5 class="card-title d-flex justify-content-center fw-400">{{__('message.+add apprenant')}}</h5>
              <div class="card-body">
                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.name')}}</label>
                                <input class="form-control rounded" type="text" placeholder="" value="{{old('Nom')}}" name="Nom">
                                @error('Nom')
                                    <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.prenom')}}</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Prenom">
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.email')}}</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Email">
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.phone')}}</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Phone">
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.adress')}}</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Adress">
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.cin')}}</label>
                                <input class="form-control rounded" type="text" value="{{old('CIN')}}" placeholder="CIN" name="CIN">
                                @error('CIN')
                                    <label style="color: red;">{{$message}}</label>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.date_naissance')}}</label>
                                <input class="form-control rounded" type="text" placeholder="" name="Date_naissance">
                            </div>
                            
                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.image')}}</label>
                                <input type="file" name="Image" id="Image" value="{{old('Image')}}">
                                @error('Image')
                                <label style="color: red;">{{$message}}</label>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="text-muted" for="">{{__('message.group')}}</label>
                                <select class="btn form-control rounded btn-secondary dropdown-toggle ml-2" name="Preparation_brief_id" id="Preparation_brief_id">
                                    <option value="">{{__('message.all_groups')}}</option>
                                    @foreach ($groupes as $value)
                                    <option value="{{$value->id}}">{{$value->Nom_groupe}}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="d-flex justify-content-between">
                                <button class="btn  btn-primary">{{__('message.add')}}</button>
                                <a class="btn  btn-secondary" href="{{ route('apprenant.index') }}">{{__('message.cancel')}}</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>



@endsection
