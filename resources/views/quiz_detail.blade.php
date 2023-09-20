<x-app-layout>
    <x-slot name="header">
        {{$quiz->title}}
    </x-slot>
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if($quiz->my_rank)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sıralama
                            <span title="" class="badge badge-success badge-pill" style="background: green">#{{$quiz->my_rank}}</span>
                        </li>
                        @endif
                        @if($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Puan
                            <span title="" class="badge badge-primary badge-pill"
                                style="background: blue">{{$quiz->my_result->point}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Doğru / Yanlış Sayısı
                            <div class="float-right">
                                <span title="" class="badge badge-success badge-pill"
                                    style="background: green">{{$quiz->my_result->correct}} Doğru</span>
                                <span title="" class="badge badge-danger badge-pill"
                                    style="background: red">{{$quiz->my_result->wrong}} Yanlış</span>
                            </div>
                        </li>
                        @endif
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

                                    <span @if(auth()->user()->id==$result->user_id) class="text-danger" @endif>{{$result->user->name}}</span>

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
                    @if($quiz->my_result)
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-warning btn-sm"
                        style="width: 100%;">Quiz'i Görüntüle</a>
                    @elseif($quiz->finished_at>now())
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-sm"
                        style="width: 100%;">Quiz'e Katıl</a>
                    @endif
                </div>
            </div>


        </div>
    </div>


</x-app-layout>