<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use TweedeGolf\PrometheusClient\CollectorRegistry;
use TweedeGolf\PrometheusClient\Format\TextFormatter;
use App\Metric\Enum\LogMetricNameEnum;


class ApiController extends AbstractController
{
    private CollectorRegistry $collectorRegistry;

    public function __construct(CollectorRegistry $collectorRegistry)
    {
        $this->collectorRegistry = $collectorRegistry;
    }

    /**
     * @Route("/data", name="api_post_data", methods={"POST"})
     */
    public function postData(Request $request): Response
    {
        $json = json_decode($request->getContent(), true);

        if (is_null($json)) {
            return new JsonResponse("Incorrect format", Response::HTTP_BAD_REQUEST);
        }

        foreach (['temperature', 'humility', 'rain_fall', 'wind_speed', 'device_name', 'wind_direction'] as $elem) {
            if (!isset($json[$elem])) {
                return new JsonResponse("Missing field ". $elem, Response::HTTP_BAD_REQUEST);
            }
        }
 
        $histogram = $this->collectorRegistry->getHistogram(LogMetricNameEnum::APP_WEATHER_TEMPERATURE);
        $histogram->observe(floatval($json['temperature']), $this->getLabels($json['device_name']));

        $histogram = $this->collectorRegistry->getHistogram(LogMetricNameEnum::APP_WEATHER_HUMILITY);
        $histogram->observe(floatval($json['humility']), $this->getLabels($json['device_name']));

        $histogram = $this->collectorRegistry->getHistogram(LogMetricNameEnum::APP_WEATHER_RAIN_FALL);
        $histogram->observe(floatval($json['rain_fall']), $this->getLabels($json['device_name']));

        $histogram = $this->collectorRegistry->getHistogram(LogMetricNameEnum::APP_WEATHER_WIND_SPEED);
        $histogram->observe(floatval($json['wind_speed']), $this->getLabels($json['device_name']));

        $histogram = $this->collectorRegistry->getHistogram(LogMetricNameEnum::APP_WEATHER_WIND_DIRECTION);
        $histogram->observe(floatval($json['wind_direction']), $this->getLabels($json['device_name']));

        return new Response('', Response::HTTP_CREATED);
    }

    private function getLabels(string $deviceName): array
    {
        return [
            "labs",
            "weather",
            $deviceName
        ];
    }
}
