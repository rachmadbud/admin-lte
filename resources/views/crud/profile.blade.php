@extends('layouts.master')

@section('title', 'Karyawan')

@section('content')
<div class="content-wrapper">
          <!-- Default box -->
          <div class="card card-solid">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3 class="d-inline-block d-sm-none"></h3>
                  <div class="col-12">
                    <img src="{{ asset('img/' . $datas->foto )}}" class="table-avatar" style=" width: 1100;  height:1100;"  alt="Product Image">
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <h3 class="my-3">{{ $datas->nama}}</h3>
                  <hr>

                  
              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Detail</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <strong><i class="fas fa-phone mr-1"></i> Nomor Telpon</strong>

                  <p class="text-muted">
                  {{ $datas->notelpon}}
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                  <p class="text-muted">{{ $datas->alamat}}</p>

                  <hr>

                  <strong><i class="far fa-file-alt mr-1"></i>Posisi</strong>

                  <p class="text-muted">{{ $datas->posisi}}</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card --> 

                  <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                      <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                      <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                      <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                      <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                  </div>

                </div>
              </div>
            </div>
          <!-- /.card-body -->
          </div>
          <!-- /.card -->
</div>
@endsection