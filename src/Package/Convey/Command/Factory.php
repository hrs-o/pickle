<?php

/**
 * Pickle
 *
 *
 * @license
 *
 * New BSD License
 *
 * Copyright © 2015-2015, Pickle community. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the Hoa nor the names of its contributors may be
 *       used to endorse or promote products derived from this software without
 *       specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS AND CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace Pickle\Package\Convey\Command;

use Pickle\Package\PHP\Convey\Command\Pecl;
use Composer\IO\ConsoleIO;

class Factory
{
    /**
     * @param $type
     * @param $path
     * @param ConsoleIO $io
     *
     * @return \Pickle\Base\Abstracts\Package\Convey\Command
     */
    public static function getCommand($type, $path, ConsoleIO $io)
    {
        switch ($type) {
            case Type::PICKLE:
                return new Pickle($path, $io);
            case Type::PECL:
                return new Pecl($path, $io);

            case Type::GIT:
                return new Git($path, $io);

            case Type::TGZ:
                return new Tgz($path, $io);

            case Type::SRC_DIR:
                return new SrcDir($path, $io);
        }

        return new Any($path, $io);
    }
}

/* vim: set tabstop=4 shiftwidth=4 expandtab: fdm=marker */
