<div class="container">
    <h1>Profil de {{ $user->name }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nom:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>
</div>