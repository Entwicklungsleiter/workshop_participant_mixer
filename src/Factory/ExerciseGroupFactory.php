<?php

namespace App\Factory;

use App\Entity\ExerciseGroup;
use App\Repository\ExerciseGroupRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<ExerciseGroup>
 *
 * @method static ExerciseGroup|Proxy createOne(array $attributes = [])
 * @method static ExerciseGroup[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static ExerciseGroup[]|Proxy[] createSequence(array|callable $sequence)
 * @method static ExerciseGroup|Proxy find(object|array|mixed $criteria)
 * @method static ExerciseGroup|Proxy findOrCreate(array $attributes)
 * @method static ExerciseGroup|Proxy first(string $sortedField = 'id')
 * @method static ExerciseGroup|Proxy last(string $sortedField = 'id')
 * @method static ExerciseGroup|Proxy random(array $attributes = [])
 * @method static ExerciseGroup|Proxy randomOrCreate(array $attributes = [])
 * @method static ExerciseGroup[]|Proxy[] all()
 * @method static ExerciseGroup[]|Proxy[] findBy(array $attributes)
 * @method static ExerciseGroup[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static ExerciseGroup[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ExerciseGroupRepository|RepositoryProxy repository()
 * @method ExerciseGroup|Proxy create(array|callable $attributes = [])
 */
final class ExerciseGroupFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'name' => 'Group '.self::faker()->randomDigitNotZero(),
            'exercise' => ExerciseFactory::random(),
            'student' => StudentFactory::randomRange(2, 4)
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(ExerciseGroup $exerciseGroup): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ExerciseGroup::class;
    }
}
