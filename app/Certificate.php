<?php
/*
This file is part of HTTPmon

Copyright (C) 2016  Leon Jacobs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software Foundation,
Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301  USA
*/

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'cn', 'subject', 'hash', 'issuer', 'version', 'serial_number', 'valid_from',
        'valid_to', 'purposes', 'extentions', 'key_bits', 'public_key', 'ssl_labs_rating',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'subject'    => 'array',
        'issuer'     => 'array',
        'purposes'   => 'array',
        'extentions' => 'array',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'valid_from', 'valid_to', 'ssl_labs_last_update'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function url()
    {

        return $this->belongsTo(Url::class);
    }
}
