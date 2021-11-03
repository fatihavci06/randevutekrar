@extends('layouts.app')

@section('content')
<div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="onay-tab" data-bs-toggle="tab" data-bs-target="#onay" type="button" role="tab" aria-controls="onay" aria-selected="true">Onay Bekleyen</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">Bugünkü Randevular</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Gelecek Randevular</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Geçmiş Randevular</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="iptal-tab" data-bs-toggle="tab" data-bs-target="#iptal" type="button" role="tab" aria-controls="iptal" aria-selected="false">İptal Edilen Randevular</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="onay" role="tabpanel" aria-labelledby="onaye-tab"><onay-component></bugun-component></div>
  <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab"><bugun-component></bugun-component></div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><gelecek-component></gelecek-component></div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><gecmis-component></gecmis-component></div>
  <div class="tab-pane fade" id="iptal" role="tabpanel" aria-labelledby="iptal-tab"><iptal-component></iptal-component></div>
</div>
    
</div>
@endsection
