<x-app-layout>
    <x-slot name="header">
        {{$quiz->title}}
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('quizzes.index') }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left"></i> Quizlere
                    Dön</a>
            </h5>

            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                       
                        @if($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Son Katılım Tarihi
                            <span title="{{$quiz->finished_at}}" class="badge badge-secondary badge-pill"
                                style="background: gray">{{$quiz->finished_at->diffForHumans()}}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı
                            <span class="badge badge-primary badge-pill"
                                style="background: gray">{{$quiz->questions_count}}</span>
                        </li>
                        @if($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Katılımcı Sayısı
                            <span class="badge badge-warning badge-pill"
                                style="background: yellow;color:black">{{$quiz->details['join_count']}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ortalama Puan
                            <span class="badge badge-light badge-pill"
                                style="color:black ">{{$quiz->details['average']}}</span>
                        </li>
                        @endif
                    </ul>
                    @if(count($quiz->topTen)>0)

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Top 10</h5>
                            <ul class="list-group ">
                                @foreach($quiz->topTen as $result)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong class="h5">{{$loop->iteration}}.</strong>
                                    <img src="{{$result->user->profile_photo_url}}" alt="" class="w-8 h-8 rounded-full">

                                    <span @if(auth()->user()->id==$result->user_id) class="text-danger"
                                        @endif>{{$result->user->name}}</span>

                                    <span class="badge badge-success badge-pill"
                                        style="background:green ">{{$result->point}}</span>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    @endif


                </div>
                <div class="col-md-8">
                    <h5 class="card-title">{{$quiz->description}}</h5>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Puan</th>
                                <th scope="col">Doğru</th>
                                <th scope="col">Yanlış</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quiz->results as $result)
                        
                            <tr>
                                <td>{{$result->user->name}}</td>
                                <td>{{$result->point}}</td>
                                <td>{{$result->correct}}</td>
                                <td>{{$result->wrong}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>


        </div>
    </div>


</x-app-layout>