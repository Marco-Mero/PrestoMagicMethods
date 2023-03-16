<section title="Inserimento Articolo" class="form-livewire">

    {{-- TODO metti messaggio di sessione --}}
    @if (session()->has('message'))
        <div class="flex flex-row justify-center my-2 alert alert-success"> {{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="store" class="form-custom-leo form-store ">

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" wire:model="title" id="title"
                class="form-control @error('title') is-invalid @enderror" placeholder="Un Titolo Sagace">
            {{-- if per gli errori --}}
            @error('title')
                {{ $message }}
            @enderror
        </div>

        <div class="form-group">
            <label for="body">Descrizione</label>
            <textarea wire:model="body" id="body" cols="30" rows="5"
                class="form-control @error('body') is-invalid @enderror" placeholder="Una descrizione precisa e concisa">

            </textarea>
            @error('body')
                {{ $message }}
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" wire:model="price" id="price"
                class="form-control @error('price') is-invalid @enderror" placeholder="€">
            @error('price')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Categoria</label>
            <select wire:model.defer="category" name="" id="category"
                class="form-control @error('category') is-invalid @enderror" placeholder="Scegli la categoria">
                <option value="">Scegli la Categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                {{ $message }}
            @enderror
        </div>

        <div class="form-group mt-3">

            <input wire:model="temporary_images" type="file" multiple name="images"
                class="form-control shadow @error('temporary_images') is-invalid @enderror " placeholder="Img">

            @error('temporary_images')
                <p>{{ $message }}</p>
            @enderror

            @error('temporary_images.*')
                <p>{{ $message }}</p>
            @enderror

            @if (!empty($images))
                <p>Anteprima Foto</p>
                <section class="grid-images" title="Anteprima immagini">
                    @foreach ($images as $key => $image)
                        <figure>
                            <img src="{{ $image->temporaryUrl() }}" class="img-create" alt="Immagine di anteprima">
                            <button type="button" class="btn-custom opacity70 opacity100-focus m-3 p-1"
                                wire:click="removeImage({{ $key }})">Cancella</button>
                        </figure>
                    @endforeach
                </section>
            @endif

        </div>
        <button type="submit" class="btn btn-custom_special shadow px-4 my-3">Crea</button>
    </form>

</section>
