<?php

/*
 * Licensed to Elasticsearch B.V. under one or more contributor
 * license agreements. See the NOTICE file distributed with
 * this work for additional information regarding copyright
 * ownership. Elasticsearch B.V. licenses this file to you under
 * the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

declare(strict_types=1);

namespace ElasticApmTests\Util;

use Elastic\Apm\Impl\Util\StaticClassTrait;
use LogicException;

/**
 * Code in this file is part of implementation internals and thus it is not covered by the backward compatibility.
 *
 * @internal
 */
final class IterableUtilForTests
{
    use StaticClassTrait;

    /**
     * @param iterable<mixed> $iterable
     *
     * @return int
     */
    public static function count(iterable $iterable): int
    {
        $result = 0;
        foreach ($iterable as $iterableValue) {
            ++$result;
        }
        return $result;
    }

    /**
     * @param iterable<mixed> $iterable
     *
     * @return bool
     */
    public static function isEmpty(iterable $iterable): bool
    {
        foreach ($iterable as $iterableValue) {
            return false;
        }
        return true;
    }

    /**
     * @template T
     *
     * @param iterable<T> $iterable
     *
     * @return array<T>
     */
    public static function toArray(iterable $iterable): array
    {
        if (is_array($iterable)) {
            return $iterable;
        }

        $result = [];
        foreach ($iterable as $value) {
            $result[] = $value;
        }

        return $result;
    }
}
