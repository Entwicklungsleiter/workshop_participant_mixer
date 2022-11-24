<?php

namespace App\Factory;

use App\Entity\Exercise;
use App\Repository\ExerciseRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Exercise>
 *
 * @method static Exercise|Proxy createOne(array $attributes = [])
 * @method static Exercise[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Exercise[]|Proxy[] createSequence(array|callable $sequence)
 * @method static Exercise|Proxy find(object|array|mixed $criteria)
 * @method static Exercise|Proxy findOrCreate(array $attributes)
 * @method static Exercise|Proxy first(string $sortedField = 'id')
 * @method static Exercise|Proxy last(string $sortedField = 'id')
 * @method static Exercise|Proxy random(array $attributes = [])
 * @method static Exercise|Proxy randomOrCreate(array $attributes = [])
 * @method static Exercise[]|Proxy[] all()
 * @method static Exercise[]|Proxy[] findBy(array $attributes)
 * @method static Exercise[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Exercise[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ExerciseRepository|RepositoryProxy repository()
 * @method Exercise|Proxy create(array|callable $attributes = [])
 */
final class ExerciseFactory extends ModelFactory
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
            'name' => self::faker()->text(),
            'max_people' => rand(2,8),
            'course' => CourseFactory::random()
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Exercise $exercise): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Exercise::class;
    }
}
