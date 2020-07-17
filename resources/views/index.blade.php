@extends('layouts.master')

@section('title', 'Karyawan')

@section('content')

@include('sweetalert::alert')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pegawai</h1>
          </div>
          <div class="col-sm-6 my-2">
              <ol class="breadcrumb float-sm-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                  <i class="far fa-user-plus"></i>
                </button>
              </ol>
            </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
          <h1 class="card-title">Tambah Data Karyawan</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
          </div>
          <div class="modal-body">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('/karyawan')}}" method="post" enctype="multipart/form-data" role="form">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                  <label for="exampleInputFile">Masukkan Foto</label>
                  <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"></span>
                  </div>
                    <div class="custom-file">
                      <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label"  for="exampleInputFile">Foto</label>
                    </div>
                  </div>
                </div>

                <label for="exampleInputFile">Posisi</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"></span>
                  </div>
                  <input type="text" name="posisi" id="posisi" class="form-control" placeholder="Posisi">
                </div>
                
                <label for="exampleInputFile">Nama Panjang</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"></span>
                  </div>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="nama">
                </div>

                <label for="exampleInputFile">Alamat</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"></span>
                  </div>
                  <div class="col-sm-8">
                    <!-- <textarea class="form-control"  placeholder="Enter ..."></textarea> -->
                    <textarea class="form-control" rows="3" type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat"></textarea>
                  </div>
                </div>

                  <label for="exampleInputFile">Nomor Telpon</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="notelpon" id="notelpon" class="form-control" placeholder="notelpon">
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- Main content -->
    <section class="content">

        <!-- Looping -->
        <!-- Default box -->
          <div class="card-body p-0">
          <div class="table-responsive">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Nama panjang
                      </th>
                      <th style="width: 30%">
                          Profil
                      </th>
                      <th>
                          Project Progress
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
            <?php $i = 0; ?>
              @foreach($data as $datas)
            <?php $i++; ?>
                  <tr>
                      <td>
                      {{ $i }}
                      </td>
                      <td>
                          <a>
                          {{ $datas->nama }}
                          </a>
                          <br/>
                          <small>
                              Diinput pada {{ $datas->created_at }}
                              Diubah pada {{ $datas->updated_at }}
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item center">
                                  <img alt="Avatar" class="table-avatar" widht="50" height="50" src="{{ asset('img/' . $datas->foto )}}">
                              </li>
                          </ul>
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                              </div>
                          </div>
                          <small>
                              <!-- 8% Complete -->
                          </small>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">Karyawan</span>
                      </td>
                      <td class="project-actions text-right">
                          <a href="{{ route('profile', $datas->id) }}">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view" data-whatever="@fat"><i class="fal fa-eye"></i></button>
                          </a>
                          <a href="karyawan/{{ $datas->id }} ">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit" data-whatever="@fat"><i class="fad fa-edit"></i></button>
                          </a>
                          
                          <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                            <i class="fad fa-trash-alt"></i>
                            </button>

                          <!-- Modal -->
                          <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Hapus...?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <form method="POST" class="d-inline" action="karyawan/{{ $datas->id }}/delete">
                                      @csrf
                                      <input type="hidden" value="DELETE" name="_method">
                                      <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                      </td>
                  </tr>
              @endforeach
              </tbody>
              <!-- < ?php $i++ ? > -->
        <!-- < ?php endforeach; ? > -->
          </table>
          </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection


<img src="namaFile.png" alt="">