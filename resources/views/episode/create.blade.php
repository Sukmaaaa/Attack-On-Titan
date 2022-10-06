@extends('adminlte::page')
@section('title', 'Add Episode')

@section('content_header')
<h1>Add Episode</h1>
@endsection

@section('content')
<form action="{{ route('episode.store') }}" method="POST" class="container">
    @csrf
    <div class="card">
        <div class="card-header">
            <label>Add New Episode</label>
        </div>

        <div class="card-body">
            <!--  'noInSeason','titleCard', 'title', 'directedBy', 'writenBy', 'originalAirDate', 'description' -->

            <x-adminlte-input type="url" name="titleCard" label="Title Card:" placeholder="Please insert link">
            </x-adminlte-input>
            <div class="row">
                <x-adminlte-input type="number" name="noInSeason" label="No in Season:" placeholder="1" fgroup-class="col-md-6">
                </x-adminlte-input>

                <x-adminlte-input type="text" name="title" label="Title:" placeholder="To You, in 2000 Years: The Fall of Shiganshina, Part 1" fgroup-class="col-md-6">
                </x-adminlte-input>
            </div>

            <div class="row">
                <x-adminlte-input type="text" name="directedBy" label="Directed By:" placeholder="Masashi Koizuka" fgroup-class="col-md-6">
                </x-adminlte-input>
                <x-adminlte-input type="text" name="writenBy" label="Writen By:" placeholder="Yasuko Kobayashi" fgroup-class="col-md-6">
                </x-adminlte-input>
            </div>

            <x-adminlte-textarea type="text" name="description" label="Description:" placeholder="For over a century, humans have been living in settlements surrounded by three 50m gigantic walls, Wall Maria, Wall Rose and Wall Sina, which prevent the Titans, giant humanoid creatures who eat humans, from entering. Eren Jaeger, of the town called the Shiganshina District, wishes to see the outside world by joining the Scout Regiment, as he likens living in the cities to livestock. Despite this, his friend Mikasa Ackermann and their mother Carla Jaeger are against him joining the Scouts. Even after seeing the Scouts return home with large casualties, Eren expresses his interest to join, which impresses his father Grisha Jaeger, who promises to show him what lies in their basement once he returns. After Eren and Mikasa rescue their friend Armin Arlert from a group of delinquents, the Colossal Titan, a 60m Titan, suddenly appears and knocks down the gate to the Shiganshina District, which lies in the outer edge of Wall Maria, allowing smaller Titans to enter. As the town erupts into mass panic, Eren and Mikasa rush back to their house, only to see Carla pinned under their collapsed house. As a Smiling Titan approaches them, Carla begs them to flee, but they refuse until city guard Hannes arrives and assures them that he will defend them. However, as he charges towards the Titan, he is overcome with fear and takes Eren and Mikasa away. Eren watches in horror as a Smiling Titan eats Carla." rows=10>
            </x-adminlte-textarea>

            <div class="row">
                <x-adminlte-input type="date" name="originalAirDate" label="Original Air Date:" placeholder="To You, in 2000 Years: The Fall of Shiganshina, Part 1" fgroup-class="col-md-6">
                </x-adminlte-input>

                <x-adminlte-select name="series" label="Series:" fgroup-class="col-md-6">
                    @foreach($series as $series2)
                    <option value="{{ $series2->id }}"> {{ $series2->title }}
                    </option>
                    @endforeach
                </x-adminlte-select>
            </div>



            <div class="d-flex flex-row justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                <x-adminlte-button class="btn bg-dark" label="Save" type="submit"></x-adminlte-button>
            </div>
        </div>




    </div>
</form>
@endsection