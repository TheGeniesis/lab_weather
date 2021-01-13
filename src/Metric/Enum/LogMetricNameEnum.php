<?php

namespace App\Metric\Enum;

class LogMetricNameEnum
{
    const APP_REQUEST_CALLED_QUANTITY_TOTAL = 'app_request_called_quantity_total';
    const APP_REQUEST_EXECUTION_TIME_SECONDS = 'app_request_execution_time_seconds';
    const APP_REQUEST_DB_QUERY_EXECUTION_TIME_SECONDS = 'app_request_db_query_execution_time_seconds';
    const APP_REQUEST_DB_QUERY_QUANTITY = 'app_request_db_query_quantity';
    const APP_SUB_REQUEST_CALLED_QUANTITY_TOTAL = 'app_sub_request_called_quantity_total';
    const APP_REQUEST_DB_QUERY_TYPE = 'app_request_db_query_type';

    const APP_WEATHER_TEMPERATURE = 'app_weather_temperature';
    const APP_WEATHER_HUMILITY = 'app_weather_humility';
    const APP_WEATHER_RAIN_FALL = 'app_weather_rain_fall';
    const APP_WEATHER_WIND_SPEED = 'app_weather_wind_speed';
    const APP_WEATHER_WIND_DIRECTION = 'app_weather_wind_direction';
}
