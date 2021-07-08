<div class="fields-wrapper">

    <div class="field {{ $errors->has('name') ? ' field--error' : '' }}">
        <label for="member_first_name" class="field__label">Naam:</label>
        <div class="field__input input-wrapper">
            <input type="text" name="name" value="{{ old('name', $house->name) }}" autocomplete="none">
        </div>

        @if ($errors->has('name'))
            <p class="field__description field__description--error" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </p>
        @endif
    </div>

    <div class="field {{ $errors->has('type') ? ' field--error' : '' }}">
        <label for="user_id" class="field__label">Type:</label>
        <div class="field__input input-wrapper input-wrapper--has-icon-right">
            <div class="icon icon--right">
                <i class="fa fa-caret-down"></i>
            </div>
            <select name="type" class="toggle-checklist subselector" data-subselect-target=".member-device-wrapper" data-subselect-reset=".member-device-wrapper" autocomplete="none">
                <option value="" disabled="" selected="">Selecteer huistype</option>
                @foreach($types as $type)
                    @if(!empty($house->type) && $type == $house->type)
                        <option selected="selected" value="{{ $type }}">{{ $type }}</option>
                    @else
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="field {{ $errors->has('surface') ? ' field--error' : '' }}">
        <label for="surface" class="field__label">Oppervlakte:</label>
        <div class="field__input input-wrapper">
            <input type="text" name="surface" value="{{ old('surface', $house->surface) }}" autocomplete="none">
        </div>

        @if ($errors->has('surface'))
            <p class="field__description field__description--error" role="alert">
                <strong>{{ $errors->first('surface') }}</strong>
            </p>
        @endif
    </div>

    <div class="field {{ $errors->has('rooms') ? ' field--error' : '' }}">
        <label for="surface" class="field__label">Kamers:</label>
        <div class="field__input input-wrapper">
            <input type="number" name="rooms" value="{{ old('rooms', $house->rooms) }}" autocomplete="none">
        </div>

        @if ($errors->has('rooms'))
            <p class="field__description field__description--error" role="alert">
                <strong>{{ $errors->first('rooms') }}</strong>
            </p>
        @endif
    </div>

    <div class="field {{ $errors->has('price') ? ' field--error' : '' }}">
        <label for="surface" class="field__label">Prijs:</label>
        <div class="field__input input-wrapper">
            <input type="number" name="price" value="{{ old('price', $house->price) }}" autocomplete="none">
        </div>

        @if ($errors->has('price'))
            <p class="field__description field__description--error" role="alert">
                <strong>{{ $errors->first('price') }}</strong>
            </p>
        @endif
    </div>

    <div class="field {{ $errors->has('status') ? ' field--error' : '' }}">
        <label for="user_id" class="field__label">Status:</label>
        <div class="field__input input-wrapper input-wrapper--has-icon-right">
            <div class="icon icon--right">
                <i class="fa fa-caret-down"></i>
            </div>
            <select name="status" class="toggle-checklist subselector" data-subselect-target=".member-device-wrapper" data-subselect-reset=".member-device-wrapper" autocomplete="none">
                <option value="" disabled="" selected="">Selecteer status</option>
                @foreach($statuses as $status)
                    @if(!empty($house->status) && $status == $house->status)
                        <option selected="selected" value="{{ $status }}">{{ $status }}</option>
                    @else
                        <option value="{{ $status }}">{{ $status}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="field"> 
        <label class="field__label">Afbeeldingen</label> 
        <p class="field-description">
            Selecteer tot 3 afbeeldingen (maximale afbeeldingsgrootte: 1mb) 
        </p>
        <div class="field__input input-wrapper">
            <div class="file-upload">
                <ul class="uploaded-files">
                    @foreach($house->images as $image)
                        <li class="file">
                            <a href="{{ route('admin.houses.delete-picture', [$house, $image]) }}" class="delete-file"
                               title="Remove Image"
                               rel="nofollow"><span>+</span></a>
                            <img src="/storage/houses/{{ $house->id . '/' . $image->location }}"
                                 alt="Afbeelding">
                        </li>
                    @endforeach
                    @for($counter=($house->images->count() + 1);$counter<=3;$counter++)
                        <li class="file empty"></li>
                    @endfor
                </ul>
                <div class="input-wrapper">
                    <label class="input-file">
                        <input type="file" class="input-elem" name="images[]"
                               data-multiple-caption="{count} afbeeldingen geselecteerd" multiple>
                        <span class="btn btn-small"><i class="fa fa-left fa-upload"></i><span class="btn-text">Afbeeldingen</span></span>
                    </label>
                </div>
            </div><!-- /.file-upload -->
        </div>
    </div>

</div><!-- /.fields-wrapper -->

<div class="fields-wrapper">

    <hr>

    <div class="field">
        <button class="btn btn-large btn-smaller-padding btn-primary" type="submit">Opslaan</button>
    </div>
</div>