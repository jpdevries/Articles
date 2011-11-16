<?php
/**
 * modBlog
 *
 * Copyright 2011-12 by Shaun McCormick <shaun+modblog@modx.com>
 *
 * modBlog is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * modBlog is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * modBlog; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package modblog
 */
/**
 * Package in subpackages
 *
 * @var modX $modx
 * @var modPackageBuilder $builder
 * @var array $sources
 * @package modblog
 */
$subpackages = array(
    'archivist'      => 'archivist-1.1.1-pl',
    'getpage'        => 'getpage-1.2.1-pl',
    'getresources'   => 'getresources-1.4.0-pl',
    'quip'           => 'quip-2.1.3-pl',
    'taglister'      => 'taglister-1.1.4-pl',
);
$spAttr = array('vehicle_class' => 'xPDOTransportVehicle');

foreach ($subpackages as $name => $signature) {
    $vehicle = $builder->createVehicle(array(
        'source' => $sources['subpackages'] . $signature.'.transport.zip',
        'target' => "return MODX_CORE_PATH . 'packages/';",
    ),$spAttr);
    $vehicle->validate('php',array(
        'source' => $sources['validators'].'validate.'.$name.'.php'
    ));
    $vehicle->resolve('php',array(
        'source' => $sources['resolvers'].'packages/resolve.'.$name.'.php'
    ));
    $builder->putVehicle($vehicle);
}
return true;