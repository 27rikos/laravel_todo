<div>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" wire:click href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <button wire:click='logout' wire:navigate class="dropdown-item" type="submit">Logout</button>
            </li>
        </ul>
    </li>
</div>
