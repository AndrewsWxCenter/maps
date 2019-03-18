<?php

// Pull ASOS API data:
$apiPull = file_get_contents("https://api.synopticdata.com/v2/stations/nearesttime?&token=b0b6f4798ee945bcab5c743a02626b4c&within=1440&stid=KAKH,KAND,KAVL,KBUY,KCAE,KCEU,KCHS,KCLT,KCRE,KCUB,KECG,KEQY,KEWN,KFAY,KFLO,KGMU,KGRD,KGSO,KGSP,KHKY,KHSE,KILM,KINT,KMEB,KMRH,KOGB,KRDU,KRWI,KUZA&timeformat=%25Y%25m%25d&obtimezone=local&units=english&output=json");
    // NOTE: Per NWS Wilmington, KLBT will not be operational until an unspecified time in 2020. Excludes KLBT from API query

// Pull NC AWOS API data:
$apiPull2 = file_get_contents("https://api.synopticdata.com/v2/stations/nearesttime?&token=b0b6f4798ee945bcab5c743a02626b4c&within=1440&stid=K1A5,K24A,K7W6,KAFP,KASJ,KCPC,KCTZ,KDPL,KEDE,KEHO,KETC,KEXX,KEYF,KFFA,KFQD,KGEV,KGWW,KHBI,KHNZ,KHRJ,KIPJ,KISO,KIXA,KJNX,KJQF,KLHZ,KMQI,KMRN,KMWK,KOAJ,KOCW,KONX,KPGV,KRCZ,KRHP,KRUQ,KSCR,KSIF,KSOP,KSUT,KSVH,KTDF,KTTA,KUKF,KVUJ&timeformat=%25Y%25m%25d&obtimezone=local&units=english&output=json");

// Convert JSON => object
$data = json_decode($apiPull,TRUE);
$data2 = json_decode($apiPull2,TRUE);

// Time
date_default_timezone_set($data[STATION][0][TIMEZONE]);
$time = $data[STATION][0][OBSERVATIONS][air_temp_value_1][date_time];

// Define variables for each ASOS

//
//
//
// NC ASOS DATA
//
//
//

    $KAKH_cond = $data[STATION][0][OBSERVATIONS][weather_condition_value_1d][value];
    $KAKH_temp = round($data[STATION][0][OBSERVATIONS][air_temp_value_1][value],0);
    $KAKH_6hhi = round($data[STATION][0][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KAKH_24hi = round($data[STATION][0][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KAKH_6hlo = round($data[STATION][0][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KAKH_24lo = round($data[STATION][0][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KAKH_dewp = round($data[STATION][0][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KAKH_1pcp = round($data[STATION][0][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KAKH_3pcp = round($data[STATION][0][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KAKH_6pcp = round($data[STATION][0][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KAKH_24pc = round($data[STATION][0][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    $KAKH_wind = round($data[STATION][0][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KAKH_wdir = $data[STATION][0][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KAKH_visi = round($data[STATION][0][OBSERVATIONS][visibility_value_1][value],1);
    $KAKH_metr = $data[STATION][0][OBSERVATIONS][metar_value_1][value];
    
    $KAVL_cond = $data[STATION][2][OBSERVATIONS][weather_condition_value_1d][value];
    $KAVL_temp = round($data[STATION][2][OBSERVATIONS][air_temp_value_1][value],0);
    $KAVL_6hhi = round($data[STATION][2][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KAVL_6hlo = round($data[STATION][2][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KAVL_dewp = round($data[STATION][2][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KAVL_rain = round($data[STATION][2][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KAVL_wind = round($data[STATION][2][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KAVL_wdir = $data[STATION][2][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KAVL_visi = round($data[STATION][2][OBSERVATIONS][visibility_value_1][value],1);
    $KAVL_metr = $data[STATION][2][OBSERVATIONS][metar_value_1][value];
    $KAVL_24hi = round($data[STATION][2][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KAVL_24lo = round($data[STATION][2][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KAVL_1pcp = round($data[STATION][2][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KAVL_3pcp = round($data[STATION][2][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KAVL_6pcp = round($data[STATION][2][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KAVL_24pc = round($data[STATION][2][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KBUY_cond = $data[STATION][3][OBSERVATIONS][weather_condition_value_1d][value];
    $KBUY_temp = round($data[STATION][3][OBSERVATIONS][air_temp_value_1][value],0);
    $KBUY_6hhi = round($data[STATION][3][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KBUY_6hlo = round($data[STATION][3][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KBUY_dewp = round($data[STATION][3][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KBUY_rain = round($data[STATION][3][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KBUY_wind = round($data[STATION][3][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KBUY_wdir = $data[STATION][3][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KBUY_visi = round($data[STATION][3][OBSERVATIONS][visibility_value_1][value],1);
    $KBUY_metr = $data[STATION][3][OBSERVATIONS][metar_value_1][value];
    $KBUY_24hi = round($data[STATION][3][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KBUY_24lo = round($data[STATION][3][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KBUY_1pcp = round($data[STATION][3][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KBUY_3pcp = round($data[STATION][3][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KBUY_6pcp = round($data[STATION][3][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KBUY_24pc = round($data[STATION][3][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KCLT_cond = $data[STATION][7][OBSERVATIONS][weather_condition_value_1d][value];
    $KCLT_temp = round($data[STATION][7][OBSERVATIONS][air_temp_value_1][value],0);
    $KCLT_6hhi = round($data[STATION][7][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KCLT_6hlo = round($data[STATION][7][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KCLT_dewp = round($data[STATION][7][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KCLT_rain = round($data[STATION][7][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KCLT_wind = round($data[STATION][7][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KCLT_wdir = $data[STATION][7][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KCLT_visi = round($data[STATION][7][OBSERVATIONS][visibility_value_1][value],1);
    $KCLT_metr = $data[STATION][7][OBSERVATIONS][metar_value_1][value];
    $KCLT_24hi = round($data[STATION][7][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KCLT_24lo = round($data[STATION][7][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KCLT_1pcp = round($data[STATION][7][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KCLT_3pcp = round($data[STATION][7][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KCLT_6pcp = round($data[STATION][7][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KCLT_24pc = round($data[STATION][7][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KECG_cond = $data[STATION][10][OBSERVATIONS][weather_condition_value_1d][value];
    $KECG_temp = round($data[STATION][10][OBSERVATIONS][air_temp_value_1][value],0);
    $KECG_6hhi = round($data[STATION][10][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KECG_6hlo = round($data[STATION][10][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KECG_dewp = round($data[STATION][10][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KECG_rain = round($data[STATION][10][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KECG_wind = round($data[STATION][10][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KECG_wdir = $data[STATION][10][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KECG_visi = round($data[STATION][10][OBSERVATIONS][visibility_value_1][value],1);
    $KECG_metr = $data[STATION][10][OBSERVATIONS][metar_value_1][value];
    $KECG_24hi = round($data[STATION][10][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KECG_24lo = round($data[STATION][10][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KECG_1pcp = round($data[STATION][10][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KECG_3pcp = round($data[STATION][10][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KECG_6pcp = round($data[STATION][10][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KECG_24pc = round($data[STATION][10][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KEQY_cond = $data[STATION][11][OBSERVATIONS][weather_condition_value_1d][value];
    $KEQY_temp = round($data[STATION][11][OBSERVATIONS][air_temp_value_1][value],0);
    $KEQY_6hhi = round($data[STATION][11][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KEQY_6hlo = round($data[STATION][11][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KEQY_dewp = round($data[STATION][11][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KEQY_rain = round($data[STATION][11][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEQY_wind = round($data[STATION][11][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KEQY_wdir = $data[STATION][11][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KEQY_visi = round($data[STATION][11][OBSERVATIONS][visibility_value_1][value],1);
    $KEQY_metr = $data[STATION][11][OBSERVATIONS][metar_value_1][value];
    $KEQY_24hi = round($data[STATION][11][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KEQY_24lo = round($data[STATION][11][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KEQY_1pcp = round($data[STATION][11][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KEQY_3pcp = round($data[STATION][11][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEQY_6pcp = round($data[STATION][11][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KEQY_24pc = round($data[STATION][11][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KEWN_cond = $data[STATION][12][OBSERVATIONS][weather_condition_value_1d][value];
    $KEWN_temp = round($data[STATION][12][OBSERVATIONS][air_temp_value_1][value],0);
    $KEWN_6hhi = round($data[STATION][12][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KEWN_6hlo = round($data[STATION][12][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KEWN_dewp = round($data[STATION][12][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KEWN_rain = round($data[STATION][12][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEWN_wind = round($data[STATION][12][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KEWN_wdir = $data[STATION][12][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KEWN_visi = round($data[STATION][12][OBSERVATIONS][visibility_value_1][value],1);
    $KEWN_metr = $data[STATION][12][OBSERVATIONS][metar_value_1][value];
    $KEWN_24hi = round($data[STATION][12][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KEWN_24lo = round($data[STATION][12][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KEWN_1pcp = round($data[STATION][12][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KEWN_3pcp = round($data[STATION][12][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEWN_6pcp = round($data[STATION][12][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KEWN_24pc = round($data[STATION][12][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KFAY_cond = $data[STATION][13][OBSERVATIONS][weather_condition_value_1d][value];
    $KFAY_temp = round($data[STATION][13][OBSERVATIONS][air_temp_value_1][value],0);
    $KFAY_6hhi = round($data[STATION][13][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KFAY_6hlo = round($data[STATION][13][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KFAY_dewp = round($data[STATION][13][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KFAY_rain = round($data[STATION][13][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KFAY_wind = round($data[STATION][13][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KFAY_wdir = $data[STATION][13][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KFAY_visi = round($data[STATION][13][OBSERVATIONS][visibility_value_1][value],1);
    $KFAY_metr = $data[STATION][13][OBSERVATIONS][metar_value_1][value];
    $KFAY_24hi = round($data[STATION][13][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KFAY_24lo = round($data[STATION][13][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KFAY_1pcp = round($data[STATION][13][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KFAY_3pcp = round($data[STATION][13][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KFAY_6pcp = round($data[STATION][13][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KFAY_24pc = round($data[STATION][13][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KGSO_cond = $data[STATION][17][OBSERVATIONS][weather_condition_value_1d][value];
    $KGSO_temp = round($data[STATION][17][OBSERVATIONS][air_temp_value_1][value],0);
    $KGSO_6hhi = round($data[STATION][17][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KGSO_6hlo = round($data[STATION][17][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KGSO_dewp = round($data[STATION][17][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KGSO_rain = round($data[STATION][17][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KGSO_wind = round($data[STATION][17][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KGSO_wdir = $data[STATION][17][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KGSO_visi = round($data[STATION][17][OBSERVATIONS][visibility_value_1][value],1);
    $KGSO_metr = $data[STATION][17][OBSERVATIONS][metar_value_1][value];
    $KGSO_24hi = round($data[STATION][17][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KGSO_24lo = round($data[STATION][17][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KGSO_1pcp = round($data[STATION][17][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KGSO_3pcp = round($data[STATION][17][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KGSO_6pcp = round($data[STATION][17][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KGSO_24pc = round($data[STATION][17][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KHKY_cond = $data[STATION][19][OBSERVATIONS][weather_condition_value_1d][value];
    $KHKY_temp = round($data[STATION][19][OBSERVATIONS][air_temp_value_1][value],0);
    $KHKY_6hhi = round($data[STATION][19][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KHKY_6hlo = round($data[STATION][19][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KHKY_dewp = round($data[STATION][19][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KHKY_rain = round($data[STATION][19][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KHKY_wind = round($data[STATION][19][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KHKY_wdir = $data[STATION][19][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KHKY_visi = round($data[STATION][19][OBSERVATIONS][visibility_value_1][value],1);
    $KHKY_metr = $data[STATION][19][OBSERVATIONS][metar_value_1][value];
    $KHKY_24hi = round($data[STATION][19][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KHKY_24lo = round($data[STATION][19][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KHKY_1pcp = round($data[STATION][19][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KHKY_3pcp = round($data[STATION][19][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KHKY_6pcp = round($data[STATION][19][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KHKY_24pc = round($data[STATION][19][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KHSE_cond = $data[STATION][20][OBSERVATIONS][weather_condition_value_1d][value];
    $KHSE_temp = round($data[STATION][20][OBSERVATIONS][air_temp_value_1][value],0);
    $KHSE_6hhi = round($data[STATION][20][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KHSE_6hlo = round($data[STATION][20][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KHSE_dewp = round($data[STATION][20][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KHSE_rain = round($data[STATION][20][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KHSE_wind = round($data[STATION][20][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KHSE_wdir = $data[STATION][20][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KHSE_visi = round($data[STATION][20][OBSERVATIONS][visibility_value_1][value],1);
    $KHSE_metr = $data[STATION][20][OBSERVATIONS][metar_value_1][value];
    $KHSE_24hi = round($data[STATION][20][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KHSE_24lo = round($data[STATION][20][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KHSE_1pcp = round($data[STATION][20][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KHSE_3pcp = round($data[STATION][20][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KHSE_6pcp = round($data[STATION][20][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KHSE_24pc = round($data[STATION][20][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KILM_cond = $data[STATION][21][OBSERVATIONS][weather_condition_value_1d][value];
    $KILM_temp = round($data[STATION][21][OBSERVATIONS][air_temp_value_1][value],0);
    $KILM_6hhi = round($data[STATION][21][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KILM_6hlo = round($data[STATION][21][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KILM_dewp = round($data[STATION][21][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KILM_rain = round($data[STATION][21][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KILM_wind = round($data[STATION][21][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KILM_wdir = $data[STATION][21][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KILM_visi = round($data[STATION][21][OBSERVATIONS][visibility_value_1][value],1);
    $KILM_metr = $data[STATION][21][OBSERVATIONS][metar_value_1][value];
    $KILM_24hi = round($data[STATION][21][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KILM_24lo = round($data[STATION][21][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KILM_1pcp = round($data[STATION][21][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KILM_3pcp = round($data[STATION][21][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KILM_6pcp = round($data[STATION][21][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KILM_24pc = round($data[STATION][21][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KINT_cond = $data[STATION][22][OBSERVATIONS][weather_condition_value_1d][value];
    $KINT_temp = round($data[STATION][22][OBSERVATIONS][air_temp_value_1][value],0);
    $KINT_6hhi = round($data[STATION][22][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KINT_6hlo = round($data[STATION][22][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KINT_dewp = round($data[STATION][22][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KINT_rain = round($data[STATION][22][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KINT_wind = round($data[STATION][22][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KINT_wdir = $data[STATION][22][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KINT_visi = round($data[STATION][22][OBSERVATIONS][visibility_value_1][value],1);
    $KINT_metr = $data[STATION][22][OBSERVATIONS][metar_value_1][value];
    $KINT_24hi = round($data[STATION][22][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KINT_24lo = round($data[STATION][22][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KINT_1pcp = round($data[STATION][22][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KINT_3pcp = round($data[STATION][22][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KINT_6pcp = round($data[STATION][22][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KINT_24pc = round($data[STATION][22][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KMEB_cond = $data[STATION][23][OBSERVATIONS][weather_condition_value_1d][value];
    $KMEB_temp = round($data[STATION][23][OBSERVATIONS][air_temp_value_1][value],0);
    $KMEB_6hhi = round($data[STATION][23][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KMEB_6hlo = round($data[STATION][23][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KMEB_dewp = round($data[STATION][23][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KMEB_rain = round($data[STATION][23][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KMEB_wind = round($data[STATION][23][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KMEB_wdir = $data[STATION][23][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KMEB_visi = round($data[STATION][23][OBSERVATIONS][visibility_value_1][value],1);
    $KMEB_metr = $data[STATION][23][OBSERVATIONS][metar_value_1][value];
    $KMEB_24hi = round($data[STATION][23][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KMEB_24lo = round($data[STATION][23][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KMEB_1pcp = round($data[STATION][23][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KMEB_3pcp = round($data[STATION][23][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KMEB_6pcp = round($data[STATION][23][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KMEB_24pc = round($data[STATION][23][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KMRH_cond = $data[STATION][24][OBSERVATIONS][weather_condition_value_1d][value];
    $KMRH_temp = round($data[STATION][24][OBSERVATIONS][air_temp_value_1][value],0);
    $KMRH_6hhi = round($data[STATION][24][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KMRH_6hlo = round($data[STATION][24][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KMRH_dewp = round($data[STATION][24][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KMRH_rain = round($data[STATION][24][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KMRH_wind = round($data[STATION][24][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KMRH_wdir = $data[STATION][24][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KMRH_visi = round($data[STATION][24][OBSERVATIONS][visibility_value_1][value],1);
    $KMRH_metr = $data[STATION][24][OBSERVATIONS][metar_value_1][value];
    $KMRH_24hi = round($data[STATION][24][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KMRH_24lo = round($data[STATION][24][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KMRH_1pcp = round($data[STATION][24][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KMRH_3pcp = round($data[STATION][24][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KMRH_6pcp = round($data[STATION][24][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KMRH_24pc = round($data[STATION][24][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KRDU_cond = $data[STATION][26][OBSERVATIONS][weather_condition_value_1d][value];
    $KRDU_temp = round($data[STATION][26][OBSERVATIONS][air_temp_value_1][value],0);
    $KRDU_6hhi = round($data[STATION][26][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KRDU_6hlo = round($data[STATION][26][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KRDU_dewp = round($data[STATION][26][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KRDU_rain = round($data[STATION][26][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KRDU_wind = round($data[STATION][26][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KRDU_wdir = $data[STATION][26][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KRDU_visi = round($data[STATION][26][OBSERVATIONS][visibility_value_1][value],1);
    $KRDU_metr = $data[STATION][26][OBSERVATIONS][metar_value_1][value];
    $KRDU_24hi = round($data[STATION][26][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KRDU_24lo = round($data[STATION][26][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KRDU_1pcp = round($data[STATION][26][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KRDU_3pcp = round($data[STATION][26][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KRDU_6pcp = round($data[STATION][26][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KRDU_24pc = round($data[STATION][26][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KRWI_cond = $data[STATION][27][OBSERVATIONS][weather_condition_value_1d][value];
    $KRWI_temp = round($data[STATION][27][OBSERVATIONS][air_temp_value_1][value],0);
    $KRWI_6hhi = round($data[STATION][27][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KRWI_6hlo = round($data[STATION][27][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KRWI_dewp = round($data[STATION][27][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KRWI_rain = round($data[STATION][27][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KRWI_wind = round($data[STATION][27][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KRWI_wdir = $data[STATION][27][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KRWI_visi = round($data[STATION][27][OBSERVATIONS][visibility_value_1][value],1);
    $KRWI_metr = $data[STATION][27][OBSERVATIONS][metar_value_1][value];
    $KRWI_24hi = round($data[STATION][27][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KRWI_24lo = round($data[STATION][27][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KRWI_1pcp = round($data[STATION][27][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KRWI_3pcp = round($data[STATION][27][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KRWI_6pcp = round($data[STATION][27][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KRWI_24pc = round($data[STATION][27][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    
     
//
//
//
// NC AWOS DATA
//
//
//

    $KASJ_cond = $data2[STATION][0][OBSERVATIONS][weather_condition_value_1d][value];
    $KASJ_temp = round($data2[STATION][0][OBSERVATIONS][air_temp_value_1][value],0);
    $KASJ_6hhi = round($data2[STATION][0][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KASJ_6hlo = round($data2[STATION][0][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KASJ_dewp = round($data2[STATION][0][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KASJ_rain = round($data2[STATION][0][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KASJ_wind = round($data2[STATION][0][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KASJ_wdir = $data2[STATION][0][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KASJ_visi = round($data2[STATION][0][OBSERVATIONS][visibility_value_1][value],1);
    $KASJ_metr = $data2[STATION][0][OBSERVATIONS][metar_value_1][value];
    $KASJ_24hi = round($data2[STATION][0][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KASJ_24lo = round($data2[STATION][0][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KASJ_1pcp = round($data2[STATION][0][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KASJ_3pcp = round($data2[STATION][0][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KASJ_6pcp = round($data2[STATION][0][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KASJ_24pc = round($data2[STATION][0][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KCPC_cond = $data2[STATION][1][OBSERVATIONS][weather_condition_value_1d][value];
    $KCPC_temp = round($data2[STATION][1][OBSERVATIONS][air_temp_value_1][value],0);
    $KCPC_6hhi = round($data2[STATION][1][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KCPC_6hlo = round($data2[STATION][1][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KCPC_dewp = round($data2[STATION][1][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KCPC_rain = round($data2[STATION][1][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KCPC_wind = round($data2[STATION][1][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KCPC_wdir = $data2[STATION][1][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KCPC_visi = round($data2[STATION][1][OBSERVATIONS][visibility_value_1][value],1);
    $KCPC_metr = $data2[STATION][1][OBSERVATIONS][metar_value_1][value];
    $KCPC_24hi = round($data2[STATION][1][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KCPC_24lo = round($data2[STATION][1][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KCPC_1pcp = round($data2[STATION][1][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KCPC_3pcp = round($data2[STATION][1][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KCPC_6pcp = round($data2[STATION][1][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KCPC_24pc = round($data2[STATION][1][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KCTZ_cond = $data2[STATION][2][OBSERVATIONS][weather_condition_value_1d][value];
    $KCTZ_temp = round($data2[STATION][2][OBSERVATIONS][air_temp_value_1][value],0);
    $KCTZ_6hhi = round($data2[STATION][2][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KCTZ_6hlo = round($data2[STATION][2][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KCTZ_dewp = round($data2[STATION][2][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KCTZ_rain = round($data2[STATION][2][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KCTZ_wind = round($data2[STATION][2][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KCTZ_wdir = $data2[STATION][2][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KCTZ_visi = round($data2[STATION][2][OBSERVATIONS][visibility_value_1][value],1);
    $KCTZ_metr = $data2[STATION][2][OBSERVATIONS][metar_value_1][value];
    $KCTZ_24hi = round($data2[STATION][2][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KCTZ_24lo = round($data2[STATION][2][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KCTZ_1pcp = round($data2[STATION][2][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KCTZ_3pcp = round($data2[STATION][2][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KCTZ_6pcp = round($data2[STATION][2][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KCTZ_24pc = round($data2[STATION][2][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KDPL_cond = $data2[STATION][3][OBSERVATIONS][weather_condition_value_1d][value];
    $KDPL_temp = round($data2[STATION][3][OBSERVATIONS][air_temp_value_1][value],0);
    $KDPL_6hhi = round($data2[STATION][3][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KDPL_6hlo = round($data2[STATION][3][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KDPL_dewp = round($data2[STATION][3][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KDPL_rain = round($data2[STATION][3][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KDPL_wind = round($data2[STATION][3][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KDPL_wdir = $data2[STATION][3][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KDPL_visi = round($data2[STATION][3][OBSERVATIONS][visibility_value_1][value],1);
    $KDPL_metr = $data2[STATION][3][OBSERVATIONS][metar_value_1][value];
    $KDPL_24hi = round($data2[STATION][3][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KDPL_24lo = round($data2[STATION][3][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KDPL_1pcp = round($data2[STATION][3][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KDPL_3pcp = round($data2[STATION][3][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KDPL_6pcp = round($data2[STATION][3][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KDPL_24pc = round($data2[STATION][3][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KEDE_cond = $data2[STATION][4][OBSERVATIONS][weather_condition_value_1d][value];
    $KEDE_temp = round($data2[STATION][4][OBSERVATIONS][air_temp_value_1][value],0);
    $KEDE_6hhi = round($data2[STATION][4][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KEDE_6hlo = round($data2[STATION][4][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KEDE_dewp = round($data2[STATION][4][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KEDE_rain = round($data2[STATION][4][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEDE_wind = round($data2[STATION][4][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KEDE_wdir = $data2[STATION][4][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KEDE_visi = round($data2[STATION][4][OBSERVATIONS][visibility_value_1][value],1);
    $KEDE_metr = $data2[STATION][4][OBSERVATIONS][metar_value_1][value];
    $KEDE_24hi = round($data2[STATION][4][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KEDE_24lo = round($data2[STATION][4][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KEDE_1pcp = round($data2[STATION][4][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KEDE_3pcp = round($data2[STATION][4][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEDE_6pcp = round($data2[STATION][4][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KEDE_24pc = round($data2[STATION][4][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KEXX_cond = $data2[STATION][5][OBSERVATIONS][weather_condition_value_1d][value];
    $KEXX_temp = round($data2[STATION][5][OBSERVATIONS][air_temp_value_1][value],0);
    $KEXX_6hhi = round($data2[STATION][5][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KEXX_6hlo = round($data2[STATION][5][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KEXX_dewp = round($data2[STATION][5][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KEXX_rain = round($data2[STATION][5][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEXX_wind = round($data2[STATION][5][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KEXX_wdir = $data2[STATION][5][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KEXX_visi = round($data2[STATION][5][OBSERVATIONS][visibility_value_1][value],1);
    $KEXX_metr = $data2[STATION][5][OBSERVATIONS][metar_value_1][value];
    $KEXX_24hi = round($data2[STATION][5][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KEXX_24lo = round($data2[STATION][5][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KEXX_1pcp = round($data2[STATION][5][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KEXX_3pcp = round($data2[STATION][5][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEXX_6pcp = round($data2[STATION][5][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KEXX_24pc = round($data2[STATION][5][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KFQD_cond = $data2[STATION][6][OBSERVATIONS][weather_condition_value_1d][value];
    $KFQD_temp = round($data2[STATION][6][OBSERVATIONS][air_temp_value_1][value],0);
    $KFQD_6hhi = round($data2[STATION][6][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KFQD_6hlo = round($data2[STATION][6][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KFQD_dewp = round($data2[STATION][6][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KFQD_rain = round($data2[STATION][6][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KFQD_wind = round($data2[STATION][6][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KFQD_wdir = $data2[STATION][6][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KFQD_visi = round($data2[STATION][6][OBSERVATIONS][visibility_value_1][value],1);
    $KFQD_metr = $data2[STATION][6][OBSERVATIONS][metar_value_1][value];
    $KFQD_24hi = round($data2[STATION][6][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KFQD_24lo = round($data2[STATION][6][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KFQD_1pcp = round($data2[STATION][6][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KFQD_3pcp = round($data2[STATION][6][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KFQD_6pcp = round($data2[STATION][6][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KFQD_24pc = round($data2[STATION][6][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KGEV_cond = $data2[STATION][7][OBSERVATIONS][weather_condition_value_1d][value];
    $KGEV_temp = round($data2[STATION][7][OBSERVATIONS][air_temp_value_1][value],0);
    $KGEV_6hhi = round($data2[STATION][7][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KGEV_6hlo = round($data2[STATION][7][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KGEV_dewp = round($data2[STATION][7][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KGEV_rain = round($data2[STATION][7][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KGEV_wind = round($data2[STATION][7][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KGEV_wdir = $data2[STATION][7][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KGEV_visi = round($data2[STATION][7][OBSERVATIONS][visibility_value_1][value],1);
    $KGEV_metr = $data2[STATION][7][OBSERVATIONS][metar_value_1][value];
    $KGEV_24hi = round($data2[STATION][7][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KGEV_24lo = round($data2[STATION][7][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KGEV_1pcp = round($data2[STATION][7][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KGEV_3pcp = round($data2[STATION][7][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KGEV_6pcp = round($data2[STATION][7][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KGEV_24pc = round($data2[STATION][7][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KGWW_cond = $data2[STATION][8][OBSERVATIONS][weather_condition_value_1d][value];
    $KGWW_temp = round($data2[STATION][8][OBSERVATIONS][air_temp_value_1][value],0);
    $KGWW_6hhi = round($data2[STATION][8][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KGWW_6hlo = round($data2[STATION][8][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KGWW_dewp = round($data2[STATION][8][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KGWW_rain = round($data2[STATION][8][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KGWW_wind = round($data2[STATION][8][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KGWW_wdir = $data2[STATION][8][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KGWW_visi = round($data2[STATION][8][OBSERVATIONS][visibility_value_1][value],1);
    $KGWW_metr = $data2[STATION][8][OBSERVATIONS][metar_value_1][value];
    $KGWW_24hi = round($data2[STATION][8][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KGWW_24lo = round($data2[STATION][8][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KGWW_1pcp = round($data2[STATION][8][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KGWW_3pcp = round($data2[STATION][8][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KGWW_6pcp = round($data2[STATION][8][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KGWW_24pc = round($data2[STATION][8][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KHBI_cond = $data2[STATION][9][OBSERVATIONS][weather_condition_value_1d][value];
    $KHBI_temp = round($data2[STATION][9][OBSERVATIONS][air_temp_value_1][value],0);
    $KHBI_6hhi = round($data2[STATION][9][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KHBI_6hlo = round($data2[STATION][9][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KHBI_dewp = round($data2[STATION][9][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KHBI_rain = round($data2[STATION][9][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KHBI_wind = round($data2[STATION][9][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KHBI_wdir = $data2[STATION][9][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KHBI_visi = round($data2[STATION][9][OBSERVATIONS][visibility_value_1][value],1);
    $KHBI_metr = $data2[STATION][9][OBSERVATIONS][metar_value_1][value];
    $KHBI_24hi = round($data2[STATION][9][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KHBI_24lo = round($data2[STATION][9][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KHBI_1pcp = round($data2[STATION][9][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KHBI_3pcp = round($data2[STATION][9][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KHBI_6pcp = round($data2[STATION][9][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KHBI_24pc = round($data2[STATION][9][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KHNZ_cond = $data2[STATION][10][OBSERVATIONS][weather_condition_value_1d][value];
    $KHNZ_temp = round($data2[STATION][10][OBSERVATIONS][air_temp_value_1][value],0);
    $KHNZ_6hhi = round($data2[STATION][10][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KHNZ_6hlo = round($data2[STATION][10][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KHNZ_dewp = round($data2[STATION][10][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KHNZ_rain = round($data2[STATION][10][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KHNZ_wind = round($data2[STATION][10][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KHNZ_wdir = $data2[STATION][10][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KHNZ_visi = round($data2[STATION][10][OBSERVATIONS][visibility_value_1][value],1);
    $KHNZ_metr = $data2[STATION][10][OBSERVATIONS][metar_value_1][value];
    $KHNZ_24hi = round($data2[STATION][10][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KHNZ_24lo = round($data2[STATION][10][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KHNZ_1pcp = round($data2[STATION][10][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KHNZ_3pcp = round($data2[STATION][10][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KHNZ_6pcp = round($data2[STATION][10][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KHNZ_24pc = round($data2[STATION][10][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KHRJ_cond = $data2[STATION][11][OBSERVATIONS][weather_condition_value_1d][value];
    $KHRJ_temp = round($data2[STATION][11][OBSERVATIONS][air_temp_value_1][value],0);
    $KHRJ_6hhi = round($data2[STATION][11][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KHRJ_6hlo = round($data2[STATION][11][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KHRJ_dewp = round($data2[STATION][11][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KHRJ_rain = round($data2[STATION][11][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KHRJ_wind = round($data2[STATION][11][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KHRJ_wdir = $data2[STATION][11][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KHRJ_visi = round($data2[STATION][11][OBSERVATIONS][visibility_value_1][value],1);
    $KHRJ_metr = $data2[STATION][11][OBSERVATIONS][metar_value_1][value];
    $KHRJ_24hi = round($data2[STATION][11][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KHRJ_24lo = round($data2[STATION][11][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KHRJ_1pcp = round($data2[STATION][11][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KHRJ_3pcp = round($data2[STATION][11][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KHRJ_6pcp = round($data2[STATION][11][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KHRJ_24pc = round($data2[STATION][11][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KIPJ_cond = $data2[STATION][12][OBSERVATIONS][weather_condition_value_1d][value];
    $KIPJ_temp = round($data2[STATION][12][OBSERVATIONS][air_temp_value_1][value],0);
    $KIPJ_6hhi = round($data2[STATION][12][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KIPJ_6hlo = round($data2[STATION][12][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KIPJ_dewp = round($data2[STATION][12][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KIPJ_rain = round($data2[STATION][12][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KIPJ_wind = round($data2[STATION][12][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KIPJ_wdir = $data2[STATION][12][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KIPJ_visi = round($data2[STATION][12][OBSERVATIONS][visibility_value_1][value],1);
    $KIPJ_metr = $data2[STATION][12][OBSERVATIONS][metar_value_1][value];
    $KIPJ_24hi = round($data2[STATION][12][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KIPJ_24lo = round($data2[STATION][12][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KIPJ_1pcp = round($data2[STATION][12][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KIPJ_3pcp = round($data2[STATION][12][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KIPJ_6pcp = round($data2[STATION][12][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KIPJ_24pc = round($data2[STATION][12][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KISO_cond = $data2[STATION][13][OBSERVATIONS][weather_condition_value_1d][value];
    $KISO_temp = round($data2[STATION][13][OBSERVATIONS][air_temp_value_1][value],0);
    $KISO_6hhi = round($data2[STATION][13][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KISO_6hlo = round($data2[STATION][13][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KISO_dewp = round($data2[STATION][13][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KISO_rain = round($data2[STATION][13][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KISO_wind = round($data2[STATION][13][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KISO_wdir = $data2[STATION][13][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KISO_visi = round($data2[STATION][13][OBSERVATIONS][visibility_value_1][value],1);
    $KISO_metr = $data2[STATION][13][OBSERVATIONS][metar_value_1][value];
    $KISO_24hi = round($data2[STATION][13][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KISO_24lo = round($data2[STATION][13][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KISO_1pcp = round($data2[STATION][13][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KISO_3pcp = round($data2[STATION][13][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KISO_6pcp = round($data2[STATION][13][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KISO_24pc = round($data2[STATION][13][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KJNX_cond = $data2[STATION][14][OBSERVATIONS][weather_condition_value_1d][value];
    $KJNX_temp = round($data2[STATION][14][OBSERVATIONS][air_temp_value_1][value],0);
    $KJNX_6hhi = round($data2[STATION][14][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KJNX_6hlo = round($data2[STATION][14][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KJNX_dewp = round($data2[STATION][14][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KJNX_rain = round($data2[STATION][14][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KJNX_wind = round($data2[STATION][14][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KJNX_wdir = $data2[STATION][14][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KJNX_visi = round($data2[STATION][14][OBSERVATIONS][visibility_value_1][value],1);
    $KJNX_metr = $data2[STATION][14][OBSERVATIONS][metar_value_1][value];
    $KJNX_24hi = round($data2[STATION][14][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KJNX_24lo = round($data2[STATION][14][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KJNX_1pcp = round($data2[STATION][14][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KJNX_3pcp = round($data2[STATION][14][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KJNX_6pcp = round($data2[STATION][14][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KJNX_24pc = round($data2[STATION][14][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KJQF_cond = $data2[STATION][15][OBSERVATIONS][weather_condition_value_1d][value];
    $KJQF_temp = round($data2[STATION][15][OBSERVATIONS][air_temp_value_1][value],0);
    $KJQF_6hhi = round($data2[STATION][15][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KJQF_6hlo = round($data2[STATION][15][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KJQF_dewp = round($data2[STATION][15][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KJQF_rain = round($data2[STATION][15][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KJQF_wind = round($data2[STATION][15][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KJQF_wdir = $data2[STATION][15][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KJQF_visi = round($data2[STATION][15][OBSERVATIONS][visibility_value_1][value],1);
    $KJQF_metr = $data2[STATION][15][OBSERVATIONS][metar_value_1][value];
    $KJQF_24hi = round($data2[STATION][15][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KJQF_24lo = round($data2[STATION][15][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KJQF_1pcp = round($data2[STATION][15][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KJQF_3pcp = round($data2[STATION][15][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KJQF_6pcp = round($data2[STATION][15][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KJQF_24pc = round($data2[STATION][15][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KMQI_cond = $data2[STATION][16][OBSERVATIONS][weather_condition_value_1d][value];
    $KMQI_temp = round($data2[STATION][16][OBSERVATIONS][air_temp_value_1][value],0);
    $KMQI_6hhi = round($data2[STATION][16][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KMQI_6hlo = round($data2[STATION][16][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KMQI_dewp = round($data2[STATION][16][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KMQI_rain = round($data2[STATION][16][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KMQI_wind = round($data2[STATION][16][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KMQI_wdir = $data2[STATION][16][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KMQI_visi = round($data2[STATION][16][OBSERVATIONS][visibility_value_1][value],1);
    $KMQI_metr = $data2[STATION][16][OBSERVATIONS][metar_value_1][value];
    $KMQI_24hi = round($data2[STATION][16][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KMQI_24lo = round($data2[STATION][16][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KMQI_1pcp = round($data2[STATION][16][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KMQI_3pcp = round($data2[STATION][16][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KMQI_6pcp = round($data2[STATION][16][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KMQI_24pc = round($data2[STATION][16][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);

    $KMRN_cond = $data2[STATION][17][OBSERVATIONS][weather_condition_value_1d][value];
    $KMRN_temp = round($data2[STATION][17][OBSERVATIONS][air_temp_value_1][value],0);
    $KMRN_6hhi = round($data2[STATION][17][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KMRN_6hlo = round($data2[STATION][17][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KMRN_dewp = round($data2[STATION][17][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KMRN_rain = round($data2[STATION][17][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KMRN_wind = round($data2[STATION][17][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KMRN_wdir = $data2[STATION][17][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KMRN_visi = round($data2[STATION][17][OBSERVATIONS][visibility_value_1][value],1);
    $KMRN_metr = $data2[STATION][17][OBSERVATIONS][metar_value_1][value];
    $KMRN_24hi = round($data2[STATION][17][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KMRN_24lo = round($data2[STATION][17][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KMRN_1pcp = round($data2[STATION][17][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KMRN_3pcp = round($data2[STATION][17][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KMRN_6pcp = round($data2[STATION][17][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KMRN_24pc = round($data2[STATION][17][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KMWK_cond = $data2[STATION][18][OBSERVATIONS][weather_condition_value_1d][value];
    $KMWK_temp = round($data2[STATION][18][OBSERVATIONS][air_temp_value_1][value],0);
    $KMWK_6hhi = round($data2[STATION][18][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KMWK_6hlo = round($data2[STATION][18][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KMWK_dewp = round($data2[STATION][18][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KMWK_rain = round($data2[STATION][18][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KMWK_wind = round($data2[STATION][18][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KMWK_wdir = $data2[STATION][18][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KMWK_visi = round($data2[STATION][18][OBSERVATIONS][visibility_value_1][value],1);
    $KMWK_metr = $data2[STATION][18][OBSERVATIONS][metar_value_1][value];
    $KMWK_24hi = round($data2[STATION][18][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KMWK_24lo = round($data2[STATION][18][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KMWK_1pcp = round($data2[STATION][18][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KMWK_3pcp = round($data2[STATION][18][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KMWK_6pcp = round($data2[STATION][18][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KMWK_24pc = round($data2[STATION][18][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KOAJ_cond = $data2[STATION][19][OBSERVATIONS][weather_condition_value_1d][value];
    $KOAJ_temp = round($data2[STATION][19][OBSERVATIONS][air_temp_value_1][value],0);
    $KOAJ_6hhi = round($data2[STATION][19][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KOAJ_6hlo = round($data2[STATION][19][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KOAJ_dewp = round($data2[STATION][19][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KOAJ_rain = round($data2[STATION][19][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KOAJ_wind = round($data2[STATION][19][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KOAJ_wdir = $data2[STATION][19][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KOAJ_visi = round($data2[STATION][19][OBSERVATIONS][visibility_value_1][value],1);
    $KOAJ_metr = $data2[STATION][19][OBSERVATIONS][metar_value_1][value];
    $KOAJ_24hi = round($data2[STATION][19][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KOAJ_24lo = round($data2[STATION][19][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KOAJ_1pcp = round($data2[STATION][19][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KOAJ_3pcp = round($data2[STATION][19][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KOAJ_6pcp = round($data2[STATION][19][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KOAJ_24pc = round($data2[STATION][19][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KOCW_cond = $data2[STATION][20][OBSERVATIONS][weather_condition_value_1d][value];
    $KOCW_temp = round($data2[STATION][20][OBSERVATIONS][air_temp_value_1][value],0);
    $KOCW_6hhi = round($data2[STATION][20][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KOCW_6hlo = round($data2[STATION][20][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KOCW_dewp = round($data2[STATION][20][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KOCW_rain = round($data2[STATION][20][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KOCW_wind = round($data2[STATION][20][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KOCW_wdir = $data2[STATION][20][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KOCW_visi = round($data2[STATION][20][OBSERVATIONS][visibility_value_1][value],1);
    $KOCW_metr = $data2[STATION][20][OBSERVATIONS][metar_value_1][value];
    $KOCW_24hi = round($data2[STATION][20][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KOCW_24lo = round($data2[STATION][20][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KOCW_1pcp = round($data2[STATION][20][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KOCW_3pcp = round($data2[STATION][20][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KOCW_6pcp = round($data2[STATION][20][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KOCW_24pc = round($data2[STATION][20][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KPGV_cond = $data2[STATION][21][OBSERVATIONS][weather_condition_value_1d][value];
    $KPGV_temp = round($data2[STATION][21][OBSERVATIONS][air_temp_value_1][value],0);
    $KPGV_6hhi = round($data2[STATION][21][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KPGV_6hlo = round($data2[STATION][21][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KPGV_dewp = round($data2[STATION][21][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KPGV_rain = round($data2[STATION][21][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KPGV_wind = round($data2[STATION][21][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KPGV_wdir = $data2[STATION][21][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KPGV_visi = round($data2[STATION][21][OBSERVATIONS][visibility_value_1][value],1);
    $KPGV_metr = $data2[STATION][21][OBSERVATIONS][metar_value_1][value];
    $KPGV_24hi = round($data2[STATION][21][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KPGV_24lo = round($data2[STATION][21][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KPGV_1pcp = round($data2[STATION][21][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KPGV_3pcp = round($data2[STATION][21][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KPGV_6pcp = round($data2[STATION][21][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KPGV_24pc = round($data2[STATION][21][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);

    $KRHP_cond = $data2[STATION][22][OBSERVATIONS][weather_condition_value_1d][value];
    $KRHP_temp = round($data2[STATION][22][OBSERVATIONS][air_temp_value_1][value],0);
    $KRHP_6hhi = round($data2[STATION][22][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KRHP_6hlo = round($data2[STATION][22][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KRHP_dewp = round($data2[STATION][22][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KRHP_rain = round($data2[STATION][22][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KRHP_wind = round($data2[STATION][22][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KRHP_wdir = $data2[STATION][22][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KRHP_visi = round($data2[STATION][22][OBSERVATIONS][visibility_value_1][value],1);
    $KRHP_metr = $data2[STATION][22][OBSERVATIONS][metar_value_1][value];
    $KRHP_24hi = round($data2[STATION][22][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KRHP_24lo = round($data2[STATION][22][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KRHP_1pcp = round($data2[STATION][22][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KRHP_3pcp = round($data2[STATION][22][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KRHP_6pcp = round($data2[STATION][22][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KRHP_24pc = round($data2[STATION][22][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KRUQ_cond = $data2[STATION][23][OBSERVATIONS][weather_condition_value_1d][value];
    $KRUQ_temp = round($data2[STATION][23][OBSERVATIONS][air_temp_value_1][value],0);
    $KRUQ_6hhi = round($data2[STATION][23][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KRUQ_6hlo = round($data2[STATION][23][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KRUQ_dewp = round($data2[STATION][23][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KRUQ_rain = round($data2[STATION][23][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KRUQ_wind = round($data2[STATION][23][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KRUQ_wdir = $data2[STATION][23][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KRUQ_visi = round($data2[STATION][23][OBSERVATIONS][visibility_value_1][value],1);
    $KRUQ_metr = $data2[STATION][23][OBSERVATIONS][metar_value_1][value];
    $KRUQ_24hi = round($data2[STATION][23][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KRUQ_24lo = round($data2[STATION][23][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KRUQ_1pcp = round($data2[STATION][23][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KRUQ_3pcp = round($data2[STATION][23][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KRUQ_6pcp = round($data2[STATION][23][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KRUQ_24pc = round($data2[STATION][23][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);

    $KSOP_cond = $data2[STATION][24][OBSERVATIONS][weather_condition_value_1d][value];
    $KSOP_temp = round($data2[STATION][24][OBSERVATIONS][air_temp_value_1][value],0);
    $KSOP_6hhi = round($data2[STATION][24][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KSOP_6hlo = round($data2[STATION][24][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KSOP_dewp = round($data2[STATION][24][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KSOP_rain = round($data2[STATION][24][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KSOP_wind = round($data2[STATION][24][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KSOP_wdir = $data2[STATION][24][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KSOP_visi = round($data2[STATION][24][OBSERVATIONS][visibility_value_1][value],1);
    $KSOP_metr = $data2[STATION][24][OBSERVATIONS][metar_value_1][value];
    $KSOP_24hi = round($data2[STATION][24][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KSOP_24lo = round($data2[STATION][24][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KSOP_1pcp = round($data2[STATION][24][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KSOP_3pcp = round($data2[STATION][24][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KSOP_6pcp = round($data2[STATION][24][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KSOP_24pc = round($data2[STATION][24][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KSUT_cond = $data2[STATION][25][OBSERVATIONS][weather_condition_value_1d][value];
    $KSUT_temp = round($data2[STATION][25][OBSERVATIONS][air_temp_value_1][value],0);
    $KSUT_6hhi = round($data2[STATION][25][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KSUT_6hlo = round($data2[STATION][25][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KSUT_dewp = round($data2[STATION][25][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KSUT_rain = round($data2[STATION][25][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KSUT_wind = round($data2[STATION][25][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KSUT_wdir = $data2[STATION][25][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KSUT_visi = round($data2[STATION][25][OBSERVATIONS][visibility_value_1][value],1);
    $KSUT_metr = $data2[STATION][25][OBSERVATIONS][metar_value_1][value];
    $KSUT_24hi = round($data2[STATION][25][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KSUT_24lo = round($data2[STATION][25][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KSUT_1pcp = round($data2[STATION][25][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KSUT_3pcp = round($data2[STATION][25][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KSUT_6pcp = round($data2[STATION][25][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KSUT_24pc = round($data2[STATION][25][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KSVH_cond = $data2[STATION][26][OBSERVATIONS][weather_condition_value_1d][value];
    $KSVH_temp = round($data2[STATION][26][OBSERVATIONS][air_temp_value_1][value],0);
    $KSVH_6hhi = round($data2[STATION][26][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KSVH_6hlo = round($data2[STATION][26][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KSVH_dewp = round($data2[STATION][26][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KSVH_rain = round($data2[STATION][26][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KSVH_wind = round($data2[STATION][26][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KSVH_wdir = $data2[STATION][26][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KSVH_visi = round($data2[STATION][26][OBSERVATIONS][visibility_value_1][value],1);
    $KSVH_metr = $data2[STATION][26][OBSERVATIONS][metar_value_1][value];
    $KSVH_24hi = round($data2[STATION][26][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KSVH_24lo = round($data2[STATION][26][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KSVH_1pcp = round($data2[STATION][26][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KSVH_3pcp = round($data2[STATION][26][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KSVH_6pcp = round($data2[STATION][26][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KSVH_24pc = round($data2[STATION][26][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KTDF_cond = $data2[STATION][27][OBSERVATIONS][weather_condition_value_1d][value];
    $KTDF_temp = round($data2[STATION][27][OBSERVATIONS][air_temp_value_1][value],0);
    $KTDF_6hhi = round($data2[STATION][27][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KTDF_6hlo = round($data2[STATION][27][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KTDF_dewp = round($data2[STATION][27][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KTDF_rain = round($data2[STATION][27][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KTDF_wind = round($data2[STATION][27][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KTDF_wdir = $data2[STATION][27][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KTDF_visi = round($data2[STATION][27][OBSERVATIONS][visibility_value_1][value],1);
    $KTDF_metr = $data2[STATION][27][OBSERVATIONS][metar_value_1][value];
    $KTDF_24hi = round($data2[STATION][27][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KTDF_24lo = round($data2[STATION][27][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KTDF_1pcp = round($data2[STATION][27][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KTDF_3pcp = round($data2[STATION][27][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KTDF_6pcp = round($data2[STATION][27][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KTDF_24pc = round($data2[STATION][27][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KTTA_cond = $data2[STATION][28][OBSERVATIONS][weather_condition_value_1d][value];
    $KTTA_temp = round($data2[STATION][28][OBSERVATIONS][air_temp_value_1][value],0);
    $KTTA_6hhi = round($data2[STATION][28][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KTTA_6hlo = round($data2[STATION][28][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KTTA_dewp = round($data2[STATION][28][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KTTA_rain = round($data2[STATION][28][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KTTA_wind = round($data2[STATION][28][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KTTA_wdir = $data2[STATION][28][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KTTA_visi = round($data2[STATION][28][OBSERVATIONS][visibility_value_1][value],1);
    $KTTA_metr = $data2[STATION][28][OBSERVATIONS][metar_value_1][value];
    $KTTA_24hi = round($data2[STATION][28][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KTTA_24lo = round($data2[STATION][28][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KTTA_1pcp = round($data2[STATION][28][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KTTA_3pcp = round($data2[STATION][28][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KTTA_6pcp = round($data2[STATION][28][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KTTA_24pc = round($data2[STATION][28][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KUKF_cond = $data2[STATION][29][OBSERVATIONS][weather_condition_value_1d][value];
    $KUKF_temp = round($data2[STATION][29][OBSERVATIONS][air_temp_value_1][value],0);
    $KUKF_6hhi = round($data2[STATION][29][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KUKF_6hlo = round($data2[STATION][29][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KUKF_dewp = round($data2[STATION][29][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KUKF_rain = round($data2[STATION][29][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KUKF_wind = round($data2[STATION][29][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KUKF_wdir = $data2[STATION][29][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KUKF_visi = round($data2[STATION][29][OBSERVATIONS][visibility_value_1][value],1);
    $KUKF_metr = $data2[STATION][29][OBSERVATIONS][metar_value_1][value];
    $KUKF_24hi = round($data2[STATION][29][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KUKF_24lo = round($data2[STATION][29][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KUKF_1pcp = round($data2[STATION][29][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KUKF_3pcp = round($data2[STATION][29][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KUKF_6pcp = round($data2[STATION][29][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KUKF_24pc = round($data2[STATION][29][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KVUJ_cond = $data2[STATION][30][OBSERVATIONS][weather_condition_value_1d][value];
    $KVUJ_temp = round($data2[STATION][30][OBSERVATIONS][air_temp_value_1][value],0);
    $KVUJ_6hhi = round($data2[STATION][30][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KVUJ_6hlo = round($data2[STATION][30][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KVUJ_dewp = round($data2[STATION][30][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KVUJ_rain = round($data2[STATION][30][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KVUJ_wind = round($data2[STATION][30][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KVUJ_wdir = $data2[STATION][30][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KVUJ_visi = round($data2[STATION][30][OBSERVATIONS][visibility_value_1][value],1);
    $KVUJ_metr = $data2[STATION][30][OBSERVATIONS][metar_value_1][value];
    $KVUJ_24hi = round($data2[STATION][30][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KVUJ_24lo = round($data2[STATION][30][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KVUJ_1pcp = round($data2[STATION][30][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KVUJ_3pcp = round($data2[STATION][30][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KVUJ_6pcp = round($data2[STATION][30][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KVUJ_24pc = round($data2[STATION][30][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $K1A5_cond = $data2[STATION][31][OBSERVATIONS][weather_condition_value_1d][value];
    $K1A5_temp = round($data2[STATION][31][OBSERVATIONS][air_temp_value_1][value],0);
    $K1A5_6hhi = round($data2[STATION][31][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $K1A5_6hlo = round($data2[STATION][31][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $K1A5_dewp = round($data2[STATION][31][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $K1A5_rain = round($data2[STATION][31][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $K1A5_wind = round($data2[STATION][31][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $K1A5_wdir = $data2[STATION][31][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $K1A5_visi = round($data2[STATION][31][OBSERVATIONS][visibility_value_1][value],1);
    $K1A5_metr = $data2[STATION][31][OBSERVATIONS][metar_value_1][value];
    $K1A5_24hi = round($data2[STATION][31][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $K1A5_24lo = round($data2[STATION][31][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $K1A5_1pcp = round($data2[STATION][31][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $K1A5_3pcp = round($data2[STATION][31][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $K1A5_6pcp = round($data2[STATION][31][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $K1A5_24pc = round($data2[STATION][31][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KRCZ_cond = $data2[STATION][32][OBSERVATIONS][weather_condition_value_1d][value];
    $KRCZ_temp = round($data2[STATION][32][OBSERVATIONS][air_temp_value_1][value],0);
    $KRCZ_6hhi = round($data2[STATION][32][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KRCZ_6hlo = round($data2[STATION][32][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KRCZ_dewp = round($data2[STATION][32][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KRCZ_rain = round($data2[STATION][32][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KRCZ_wind = round($data2[STATION][32][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KRCZ_wdir = $data2[STATION][32][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KRCZ_visi = round($data2[STATION][32][OBSERVATIONS][visibility_value_1][value],1);
    $KRCZ_metr = $data2[STATION][32][OBSERVATIONS][metar_value_1][value];
    $KRCZ_24hi = round($data2[STATION][32][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KRCZ_24lo = round($data2[STATION][32][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KRCZ_1pcp = round($data2[STATION][32][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KRCZ_3pcp = round($data2[STATION][32][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KRCZ_6pcp = round($data2[STATION][32][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KRCZ_24pc = round($data2[STATION][32][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KEHO_cond = $data2[STATION][33][OBSERVATIONS][weather_condition_value_1d][value];
    $KEHO_temp = round($data2[STATION][33][OBSERVATIONS][air_temp_value_1][value],0);
    $KEHO_6hhi = round($data2[STATION][33][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KEHO_6hlo = round($data2[STATION][33][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KEHO_dewp = round($data2[STATION][33][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KEHO_rain = round($data2[STATION][33][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEHO_wind = round($data2[STATION][33][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KEHO_wdir = $data2[STATION][33][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KEHO_visi = round($data2[STATION][33][OBSERVATIONS][visibility_value_1][value],1);
    $KEHO_metr = $data2[STATION][33][OBSERVATIONS][metar_value_1][value];
    $KEHO_24hi = round($data2[STATION][33][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KEHO_24lo = round($data2[STATION][33][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KEHO_1pcp = round($data2[STATION][33][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KEHO_3pcp = round($data2[STATION][33][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEHO_6pcp = round($data2[STATION][33][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KEHO_24pc = round($data2[STATION][33][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KEYF_cond = $data2[STATION][34][OBSERVATIONS][weather_condition_value_1d][value];
    $KEYF_temp = round($data2[STATION][34][OBSERVATIONS][air_temp_value_1][value],0);
    $KEYF_6hhi = round($data2[STATION][34][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KEYF_6hlo = round($data2[STATION][34][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KEYF_dewp = round($data2[STATION][34][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KEYF_rain = round($data2[STATION][34][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEYF_wind = round($data2[STATION][34][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KEYF_wdir = $data2[STATION][34][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KEYF_visi = round($data2[STATION][34][OBSERVATIONS][visibility_value_1][value],1);
    $KEYF_metr = $data2[STATION][34][OBSERVATIONS][metar_value_1][value];
    $KEYF_24hi = round($data2[STATION][34][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KEYF_24lo = round($data2[STATION][34][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KEYF_1pcp = round($data2[STATION][34][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KEYF_3pcp = round($data2[STATION][34][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KEYF_6pcp = round($data2[STATION][34][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KEYF_24pc = round($data2[STATION][34][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KFFA_cond = $data2[STATION][35][OBSERVATIONS][weather_condition_value_1d][value];
    $KFFA_temp = round($data2[STATION][35][OBSERVATIONS][air_temp_value_1][value],0);
    $KFFA_6hhi = round($data2[STATION][35][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KFFA_6hlo = round($data2[STATION][35][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KFFA_dewp = round($data2[STATION][35][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KFFA_rain = round($data2[STATION][35][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KFFA_wind = round($data2[STATION][35][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KFFA_wdir = $data2[STATION][35][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KFFA_visi = round($data2[STATION][35][OBSERVATIONS][visibility_value_1][value],1);
    $KFFA_metr = $data2[STATION][35][OBSERVATIONS][metar_value_1][value];
    $KFFA_24hi = round($data2[STATION][35][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KFFA_24lo = round($data2[STATION][35][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KFFA_1pcp = round($data2[STATION][35][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KFFA_3pcp = round($data2[STATION][35][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KFFA_6pcp = round($data2[STATION][35][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KFFA_24pc = round($data2[STATION][35][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KLHZ_cond = $data2[STATION][36][OBSERVATIONS][weather_condition_value_1d][value];
    $KLHZ_temp = round($data2[STATION][36][OBSERVATIONS][air_temp_value_1][value],0);
    $KLHZ_6hhi = round($data2[STATION][36][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KLHZ_6hlo = round($data2[STATION][36][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KLHZ_dewp = round($data2[STATION][36][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KLHZ_rain = round($data2[STATION][36][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KLHZ_wind = round($data2[STATION][36][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KLHZ_wdir = $data2[STATION][36][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KLHZ_visi = round($data2[STATION][36][OBSERVATIONS][visibility_value_1][value],1);
    $KLHZ_metr = $data2[STATION][36][OBSERVATIONS][metar_value_1][value];
    $KLHZ_24hi = round($data2[STATION][36][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KLHZ_24lo = round($data2[STATION][36][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KLHZ_1pcp = round($data2[STATION][36][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KLHZ_3pcp = round($data2[STATION][36][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KLHZ_6pcp = round($data2[STATION][36][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KLHZ_24pc = round($data2[STATION][36][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KONX_cond = $data2[STATION][37][OBSERVATIONS][weather_condition_value_1d][value];
    $KONX_temp = round($data2[STATION][37][OBSERVATIONS][air_temp_value_1][value],0);
    $KONX_6hhi = round($data2[STATION][37][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KONX_6hlo = round($data2[STATION][37][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KONX_dewp = round($data2[STATION][37][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KONX_rain = round($data2[STATION][37][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KONX_wind = round($data2[STATION][37][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KONX_wdir = $data2[STATION][37][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KONX_visi = round($data2[STATION][37][OBSERVATIONS][visibility_value_1][value],1);
    $KONX_metr = $data2[STATION][37][OBSERVATIONS][metar_value_1][value];
    $KONX_24hi = round($data2[STATION][37][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KONX_24lo = round($data2[STATION][37][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KONX_1pcp = round($data2[STATION][37][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KONX_3pcp = round($data2[STATION][37][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KONX_6pcp = round($data2[STATION][37][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KONX_24pc = round($data2[STATION][37][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KSIF_cond = $data2[STATION][38][OBSERVATIONS][weather_condition_value_1d][value];
    $KSIF_temp = round($data2[STATION][38][OBSERVATIONS][air_temp_value_1][value],0);
    $KSIF_6hhi = round($data2[STATION][38][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KSIF_6hlo = round($data2[STATION][38][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KSIF_dewp = round($data2[STATION][38][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KSIF_rain = round($data2[STATION][38][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KSIF_wind = round($data2[STATION][38][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KSIF_wdir = $data2[STATION][38][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KSIF_visi = round($data2[STATION][38][OBSERVATIONS][visibility_value_1][value],1);
    $KSIF_metr = $data2[STATION][38][OBSERVATIONS][metar_value_1][value];
    $KSIF_24hi = round($data2[STATION][38][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KSIF_24lo = round($data2[STATION][38][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KSIF_1pcp = round($data2[STATION][38][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KSIF_3pcp = round($data2[STATION][38][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KSIF_6pcp = round($data2[STATION][38][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KSIF_24pc = round($data2[STATION][38][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $K24A_cond = $data2[STATION][39][OBSERVATIONS][weather_condition_value_1d][value];
    $K24A_temp = round($data2[STATION][39][OBSERVATIONS][air_temp_value_1][value],0);
    $K24A_6hhi = round($data2[STATION][39][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $K24A_6hlo = round($data2[STATION][39][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $K24A_dewp = round($data2[STATION][39][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $K24A_rain = round($data2[STATION][39][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $K24A_wind = round($data2[STATION][39][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $K24A_wdir = $data2[STATION][39][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $K24A_visi = round($data2[STATION][39][OBSERVATIONS][visibility_value_1][value],1);
    $K24A_metr = $data2[STATION][39][OBSERVATIONS][metar_value_1][value];
    $K24A_24hi = round($data2[STATION][39][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $K24A_24lo = round($data2[STATION][39][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $K24A_1pcp = round($data2[STATION][39][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $K24A_3pcp = round($data2[STATION][39][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $K24A_6pcp = round($data2[STATION][39][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $K24A_24pc = round($data2[STATION][39][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KETC_cond = $data2[STATION][40][OBSERVATIONS][weather_condition_value_1d][value];
    $KETC_temp = round($data2[STATION][40][OBSERVATIONS][air_temp_value_1][value],0);
    $KETC_6hhi = round($data2[STATION][40][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KETC_6hlo = round($data2[STATION][40][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KETC_dewp = round($data2[STATION][40][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KETC_rain = round($data2[STATION][40][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KETC_wind = round($data2[STATION][40][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KETC_wdir = $data2[STATION][40][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KETC_visi = round($data2[STATION][40][OBSERVATIONS][visibility_value_1][value],1);
    $KETC_metr = $data2[STATION][40][OBSERVATIONS][metar_value_1][value];
    $KETC_24hi = round($data2[STATION][40][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KETC_24lo = round($data2[STATION][40][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KETC_1pcp = round($data2[STATION][40][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KETC_3pcp = round($data2[STATION][40][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KETC_6pcp = round($data2[STATION][40][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KETC_24pc = round($data2[STATION][40][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KIXA_cond = $data2[STATION][41][OBSERVATIONS][weather_condition_value_1d][value];
    $KIXA_temp = round($data2[STATION][41][OBSERVATIONS][air_temp_value_1][value],0);
    $KIXA_6hhi = round($data2[STATION][41][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KIXA_6hlo = round($data2[STATION][41][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KIXA_dewp = round($data2[STATION][41][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KIXA_rain = round($data2[STATION][41][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KIXA_wind = round($data2[STATION][41][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KIXA_wdir = $data2[STATION][41][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KIXA_visi = round($data2[STATION][41][OBSERVATIONS][visibility_value_1][value],1);
    $KIXA_metr = $data2[STATION][41][OBSERVATIONS][metar_value_1][value];
    $KIXA_24hi = round($data2[STATION][41][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KIXA_24lo = round($data2[STATION][41][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KIXA_1pcp = round($data2[STATION][41][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KIXA_3pcp = round($data2[STATION][41][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KIXA_6pcp = round($data2[STATION][41][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KIXA_24pc = round($data2[STATION][41][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $KSCR_cond = $data2[STATION][42][OBSERVATIONS][weather_condition_value_1d][value];
    $KSCR_temp = round($data2[STATION][42][OBSERVATIONS][air_temp_value_1][value],0);
    $KSCR_6hhi = round($data2[STATION][42][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $KSCR_6hlo = round($data2[STATION][42][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $KSCR_dewp = round($data2[STATION][42][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $KSCR_rain = round($data2[STATION][42][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KSCR_wind = round($data2[STATION][42][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $KSCR_wdir = $data2[STATION][42][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $KSCR_visi = round($data2[STATION][42][OBSERVATIONS][visibility_value_1][value],1);
    $KSCR_metr = $data2[STATION][42][OBSERVATIONS][metar_value_1][value];
    $KSCR_24hi = round($data2[STATION][42][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $KSCR_24lo = round($data2[STATION][42][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $KSCR_1pcp = round($data2[STATION][42][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $KSCR_3pcp = round($data2[STATION][42][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $KSCR_6pcp = round($data2[STATION][42][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $KSCR_24pc = round($data2[STATION][42][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
    $K7W6_cond = $data2[STATION][43][OBSERVATIONS][weather_condition_value_1d][value];
    $K7W6_temp = round($data2[STATION][43][OBSERVATIONS][air_temp_value_1][value],0);
    $K7W6_6hhi = round($data2[STATION][43][OBSERVATIONS][air_temp_high_6_hour_value_1][value],0);
    $K7W6_6hlo = round($data2[STATION][43][OBSERVATIONS][air_temp_low_6_hour_value_1][value],0);
    $K7W6_dewp = round($data2[STATION][43][OBSERVATIONS][dew_point_temperature_value_1][value],0);
    $K7W6_rain = round($data2[STATION][43][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $K7W6_wind = round($data2[STATION][43][OBSERVATIONS][wind_speed_value_1][value]*1.151,0);
    $K7W6_wdir = $data2[STATION][43][OBSERVATIONS][wind_cardinal_direction_value_1d][value];
    $K7W6_visi = round($data2[STATION][43][OBSERVATIONS][visibility_value_1][value],1);
    $K7W6_metr = $data2[STATION][43][OBSERVATIONS][metar_value_1][value];
    $K7W6_24hi = round($data2[STATION][43][OBSERVATIONS][air_temp_high_24_hour_value_1][value],0);
    $K7W6_24lo = round($data2[STATION][43][OBSERVATIONS][air_temp_low_24_hour_value_1][value],0);
    $K7W6_1pcp = round($data2[STATION][43][OBSERVATIONS][precip_accum_one_hour_value_1][value],2);
    $K7W6_3pcp = round($data2[STATION][43][OBSERVATIONS][precip_accum_three_hour_value_1][value],2);
    $K7W6_6pcp = round($data2[STATION][43][OBSERVATIONS][precip_accum_six_hour_value_1][value],2);
    $K7W6_24pc = round($data2[STATION][43][OBSERVATIONS][precip_accum_24_hour_value_1][value],2);
    
//
//
// END DATA INGEST
//
//
    
    ?>
    
    
    
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.6/proj4.js"></script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/mapdata/countries/us/us-nc-all.js"></script>
<script src="https://code.highcharts.com/maps/modules/pattern-fill.js"></script>

<style>
#container {
    height: 100%; 
    min-width: 0px; 
    max-width: 100%; 
    margin: 0 auto; 
}
.loading {
    margin-top: 5em;
    text-align: center;
    color: gray;
}
</style>


<div id="container"></div>


<script>
// Initiate the chart
Highcharts.mapChart('container', {

    chart: {
        map: 'countries/us/us-nc-all',
        style: {
            fontFamily: 'sans-serif'
        }
    },
    
    title: {
        text: ''
    },

    legend: {
        enabled: false
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                color: '#000000'
            }
        }
    },
    
    tooltip: {
        headerFormat: '',
        pointFormat: '<b>{point.site}</b><br>{point.cond}<br>{point.wind}'
    },

    mapNavigation: {
        enabled: false
    },

    series: [{
        // Use the gb-all map with no data as a basemap
        name: 'Basemap',
        borderColor: '#A0A0A0',
        nullColor: 'rgba(200, 200, 200, 0.3)',
        showInLegend: false
    }, {
        name: 'Separators',
        type: 'mapline',
        nullColor: '#707070',
        showInLegend: false,
        enableMouseTracking: false
    }, {
        // Specify points using lat/lon
        type: 'mappoint',
        name: 'Cities',
        color: Highcharts.getOptions().colors[1],
           data: [{
            name: '<?php echo $KAVL_temp; ?>',
            lat: 35.432,
            lon: -82.537,
            site: 'Asheville Regional Airport',
            cond: '<?php echo $KAVL_cond; ?>',
            wind: '<?php echo $KAVL_wdir; ?> <?php echo $KAVL_wind; ?>',
            dataLabels: {
			            style: {"fontSize": "28px", "fontWeight": "bold"},
            formatter() {
          if (<?php echo $KAVL_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KAVL_temp; ?></div>`
          }
          if (<?php echo $KAVL_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KAVL_temp; ?></div>`
          }
          if (<?php echo $KAVL_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KAVL_temp; ?></div>`
          }
          if (<?php echo $KAVL_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KAVL_temp; ?></div>`
          }
          if (<?php echo $KAVL_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KAVL_temp; ?></div>`
          }
          if (<?php echo $KAVL_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KAVL_temp; ?></div>`
          }
          if (<?php echo $KAVL_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KAVL_temp; ?></div>`
          }
          if (<?php echo $KAVL_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KAVL_temp; ?></div>`
          }
          if (<?php echo $KAVL_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KAVL_temp; ?></div>`
          }
          if (<?php echo $KAVL_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KAVL_temp; ?></div>`
          }
          if(<?php echo $KAVL_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KAVL_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KHKY_temp; ?>',
            lat: 35.742,
            lon: -81.382,
            site: 'Hickory Regional Airport',
            cond: '<?php echo $KHKY_cond; ?>',
            wind: '<?php echo $KHKY_wdir; ?> <?php echo $KHKY_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                        formatter() {
          if (<?php echo $KHKY_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KHKY_temp; ?></div>`
          }
          if (<?php echo $KHKY_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KHKY_temp; ?></div>`
          }
          if (<?php echo $KHKY_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KHKY_temp; ?></div>`
          }
          if (<?php echo $KHKY_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KHKY_temp; ?></div>`
          }
          if (<?php echo $KHKY_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KHKY_temp; ?></div>`
          }
          if (<?php echo $KHKY_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KHKY_temp; ?></div>`
          }
          if (<?php echo $KHKY_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KHKY_temp; ?></div>`
          }
          if (<?php echo $KHKY_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KHKY_temp; ?></div>`
          }
          if (<?php echo $KHKY_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KHKY_temp; ?></div>`
          }
          if (<?php echo $KHKY_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KHKY_temp; ?></div>`
          }
          if(<?php echo $KHKY_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KHKY_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KCLT_temp; ?>',
            lat: 35.213,
            lon: -80.949,
            site: 'Charlotte/Douglas International Airport',
            cond: '<?php echo $KCLT_cond; ?>',
            wind: '<?php echo $KCLT_wdir; ?> <?php echo $KCLT_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                        formatter() {
          if (<?php echo $KCLT_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KCLT_temp; ?></div>`
          }
          if (<?php echo $KCLT_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KCLT_temp; ?></div>`
          }
          if (<?php echo $KCLT_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KCLT_temp; ?></div>`
          }
          if (<?php echo $KCLT_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KCLT_temp; ?></div>`
          }
          if (<?php echo $KCLT_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KCLT_temp; ?></div>`
          }
          if (<?php echo $KCLT_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KCLT_temp; ?></div>`
          }
          if (<?php echo $KCLT_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KCLT_temp; ?></div>`
          }
          if (<?php echo $KCLT_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KCLT_temp; ?></div>`
          }
          if (<?php echo $KCLT_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KCLT_temp; ?></div>`
          }
          if (<?php echo $KCLT_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KCLT_temp; ?></div>`
          }
          if(<?php echo $KCLT_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KCLT_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KEQY_temp; ?>',
            lat: 35.017,
            lon: -80.621,
            site: 'Monroe Airport',
            cond: '<?php echo $KEQY_cond; ?>',
            wind: '<?php echo $KEQY_wdir; ?> <?php echo $KEQY_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KEQY_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KEQY_temp; ?></div>`
          }
          if (<?php echo $KEQY_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KEQY_temp; ?></div>`
          }
          if (<?php echo $KEQY_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KEQY_temp; ?></div>`
          }
          if (<?php echo $KEQY_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KEQY_temp; ?></div>`
          }
          if (<?php echo $KEQY_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KEQY_temp; ?></div>`
          }
          if (<?php echo $KEQY_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KEQY_temp; ?></div>`
          }
          if (<?php echo $KEQY_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KEQY_temp; ?></div>`
          }
          if (<?php echo $KEQY_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KEQY_temp; ?></div>`
          }
          if (<?php echo $KEQY_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KEQY_temp; ?></div>`
          }
          if (<?php echo $KEQY_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KEQY_temp; ?></div>`
          }
          if(<?php echo $KEQY_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KEQY_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KINT_temp; ?>',
            lat: 36.133,
            lon: -80.225,
            site: 'Smith Reynolds Airport',
            cond: '<?php echo $KINT_cond; ?>',
            wind: '<?php echo $KINT_wdir; ?> <?php echo $KINT_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KINT_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KINT_temp; ?></div>`
          }
          if (<?php echo $KINT_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KINT_temp; ?></div>`
          }
          if (<?php echo $KINT_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KINT_temp; ?></div>`
          }
          if (<?php echo $KINT_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KINT_temp; ?></div>`
          }
          if (<?php echo $KINT_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KINT_temp; ?></div>`
          }
          if (<?php echo $KINT_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KINT_temp; ?></div>`
          }
          if (<?php echo $KINT_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KINT_temp; ?></div>`
          }
          if (<?php echo $KINT_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KINT_temp; ?></div>`
          }
          if (<?php echo $KINT_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KINT_temp; ?></div>`
          }
          if (<?php echo $KINT_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KINT_temp; ?></div>`
          }
          if(<?php echo $KINT_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KINT_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KRHP_temp; ?>',
            lat: 35.194,
            lon: -83.862,
            site: 'Andrews-Murphy Airport',
            cond: '<?php echo $KRHP_cond; ?>',
            wind: '<?php echo $KRHP_wdir; ?> <?php echo $KRHP_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KRHP_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KRHP_temp; ?></div>`
          }
          if (<?php echo $KRHP_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KRHP_temp; ?></div>`
          }
          if (<?php echo $KRHP_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KRHP_temp; ?></div>`
          }
          if (<?php echo $KRHP_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KRHP_temp; ?></div>`
          }
          if (<?php echo $KRHP_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KRHP_temp; ?></div>`
          }
          if (<?php echo $KRHP_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KRHP_temp; ?></div>`
          }
          if (<?php echo $KRHP_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KRHP_temp; ?></div>`
          }
          if (<?php echo $KRHP_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KRHP_temp; ?></div>`
          }
          if (<?php echo $KRHP_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KRHP_temp; ?></div>`
          }
          if (<?php echo $KRHP_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KRHP_temp; ?></div>`
          }
          if(<?php echo $KRHP_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KRHP_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $K1A5_temp; ?>',
            lat: 35.223,
            lon: -83.415,
            site: 'Macon County Airport',
            cond: '<?php echo $K1A5_cond; ?>',
            wind: '<?php echo $K1A5_wdir; ?> <?php echo $K1A5_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $K1A5_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $K1A5_temp; ?></div>`
          }
          if (<?php echo $K1A5_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $K1A5_temp; ?></div>`
          }
          if (<?php echo $K1A5_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $K1A5_temp; ?></div>`
          }
          if (<?php echo $K1A5_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $K1A5_temp; ?></div>`
          }
          if (<?php echo $K1A5_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $K1A5_temp; ?></div>`
          }
          if (<?php echo $K1A5_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $K1A5_temp; ?></div>`
          }
          if (<?php echo $K1A5_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $K1A5_temp; ?></div>`
          }
          if (<?php echo $K1A5_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $K1A5_temp; ?></div>`
          }
          if (<?php echo $K1A5_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $K1A5_temp; ?></div>`
          }
          if (<?php echo $K1A5_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $K1A5_temp; ?></div>`
          }
          if(<?php echo $K1A5_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $K1A5_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KUKF_temp; ?>',
            lat: 36.217,
            lon: -81.083,
            site: 'Wilkes County Airport',
            cond: '<?php echo $KUKF_cond; ?>',
            wind: '<?php echo $KUKF_wdir; ?> <?php echo $KUKF_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KUKF_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KUKF_temp; ?></div>`
          }
          if (<?php echo $KUKF_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KUKF_temp; ?></div>`
          }
          if (<?php echo $KUKF_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KUKF_temp; ?></div>`
          }
          if (<?php echo $KUKF_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KUKF_temp; ?></div>`
          }
          if (<?php echo $KUKF_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KUKF_temp; ?></div>`
          }
          if (<?php echo $KUKF_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KUKF_temp; ?></div>`
          }
          if (<?php echo $KUKF_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KUKF_temp; ?></div>`
          }
          if (<?php echo $KUKF_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KUKF_temp; ?></div>`
          }
          if (<?php echo $KUKF_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KUKF_temp; ?></div>`
          }
          if (<?php echo $KUKF_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KUKF_temp; ?></div>`
          }
          if(<?php echo $KUKF_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KUKF_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KMWK_temp; ?>',
            lat: 36.457,
            lon: -80.555,
            site: 'Mount Airy/Surry County Airport',
            cond: '<?php echo $KMWK_cond; ?>',
            wind: '<?php echo $KMWK_wdir; ?> <?php echo $KMWK_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KMWK_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KMWK_temp; ?></div>`
          }
          if (<?php echo $KMWK_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KMWK_temp; ?></div>`
          }
          if (<?php echo $KMWK_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KMWK_temp; ?></div>`
          }
          if (<?php echo $KMWK_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KMWK_temp; ?></div>`
          }
          if (<?php echo $KMWK_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KMWK_temp; ?></div>`
          }
          if (<?php echo $KMWK_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KMWK_temp; ?></div>`
          }
          if (<?php echo $KMWK_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KMWK_temp; ?></div>`
          }
          if (<?php echo $KMWK_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KMWK_temp; ?></div>`
          }
          if (<?php echo $KMWK_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KMWK_temp; ?></div>`
          }
          if (<?php echo $KMWK_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KMWK_temp; ?></div>`
          }
          if(<?php echo $KMWK_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KMWK_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KSIF_temp; ?>',
            lat: 36.437,
            lon: -79.851,
            site: 'Rockingham County NC Shiloh Airport',
            cond: '<?php echo $KSIF_cond; ?>',
            wind: '<?php echo $KSIF_wdir; ?> <?php echo $KSIF_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KSIF_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KSIF_temp; ?></div>`
          }
          if (<?php echo $KSIF_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KSIF_temp; ?></div>`
          }
          if (<?php echo $KSIF_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KSIF_temp; ?></div>`
          }
          if (<?php echo $KSIF_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KSIF_temp; ?></div>`
          }
          if (<?php echo $KSIF_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KSIF_temp; ?></div>`
          }
          if (<?php echo $KSIF_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KSIF_temp; ?></div>`
          }
          if (<?php echo $KSIF_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KSIF_temp; ?></div>`
          }
          if (<?php echo $KSIF_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KSIF_temp; ?></div>`
          }
          if (<?php echo $KSIF_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KSIF_temp; ?></div>`
          }
          if (<?php echo $KSIF_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KSIF_temp; ?></div>`
          }
          if(<?php echo $KSIF_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KSIF_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KTDF_temp; ?>',
            lat: 36.285,
            lon: -78.984,
            site: 'Person County Airport',
            cond: '<?php echo $KTDF_cond; ?>',
            wind: '<?php echo $KTDF_wdir; ?> <?php echo $KTDF_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KTDF_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KTDF_temp; ?></div>`
          }
          if (<?php echo $KTDF_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KTDF_temp; ?></div>`
          }
          if (<?php echo $KTDF_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KTDF_temp; ?></div>`
          }
          if (<?php echo $KTDF_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KTDF_temp; ?></div>`
          }
          if (<?php echo $KTDF_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KTDF_temp; ?></div>`
          }
          if (<?php echo $KTDF_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KTDF_temp; ?></div>`
          }
          if (<?php echo $KTDF_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KTDF_temp; ?></div>`
          }
          if (<?php echo $KTDF_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KTDF_temp; ?></div>`
          }
          if (<?php echo $KTDF_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KTDF_temp; ?></div>`
          }
          if (<?php echo $KTDF_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KTDF_temp; ?></div>`
          }
          if(<?php echo $KTDF_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KTDF_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KIXA_temp; ?>',
            lat: 36.330,
            lon: -77.635,
            site: 'Halifax-Northampton Regional Airport',
            cond: '<?php echo $KIXA_cond; ?>',
            wind: '<?php echo $KIXA_wdir; ?> <?php echo $KIXA_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KIXA_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KIXA_temp; ?></div>`
          }
          if (<?php echo $KIXA_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KIXA_temp; ?></div>`
          }
          if (<?php echo $KIXA_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KIXA_temp; ?></div>`
          }
          if (<?php echo $KIXA_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KIXA_temp; ?></div>`
          }
          if (<?php echo $KIXA_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KIXA_temp; ?></div>`
          }
          if (<?php echo $KIXA_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KIXA_temp; ?></div>`
          }
          if (<?php echo $KIXA_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KIXA_temp; ?></div>`
          }
          if (<?php echo $KIXA_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KIXA_temp; ?></div>`
          }
          if (<?php echo $KIXA_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KIXA_temp; ?></div>`
          }
          if (<?php echo $KIXA_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KIXA_temp; ?></div>`
          }
          if(<?php echo $KIXA_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KIXA_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KLHZ_temp; ?>',
            lat: 36.023,
            lon: -78.334,
            site: 'Franklin County Airport',
            cond: '<?php echo $KLHZ_cond; ?>',
            wind: '<?php echo $KLHZ_wdir; ?> <?php echo $KLHZ_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KLHZ_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KLHZ_temp; ?></div>`
          }
          if (<?php echo $KLHZ_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KLHZ_temp; ?></div>`
          }
          if (<?php echo $KLHZ_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KLHZ_temp; ?></div>`
          }
          if (<?php echo $KLHZ_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KLHZ_temp; ?></div>`
          }
          if (<?php echo $KLHZ_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KLHZ_temp; ?></div>`
          }
          if (<?php echo $KLHZ_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KLHZ_temp; ?></div>`
          }
          if (<?php echo $KLHZ_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KLHZ_temp; ?></div>`
          }
          if (<?php echo $KLHZ_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KLHZ_temp; ?></div>`
          }
          if (<?php echo $KLHZ_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KLHZ_temp; ?></div>`
          }
          if (<?php echo $KLHZ_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KLHZ_temp; ?></div>`
          }
          if(<?php echo $KLHZ_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KLHZ_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KFFA_temp; ?>',
            lat: 36.017,
            lon: -75.667,
            site: 'First Flight Airport',
            cond: '<?php echo $KFFA_cond; ?>',
            wind: '<?php echo $KFFA_wdir; ?> <?php echo $KFFA_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KFFA_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KFFA_temp; ?></div>`
          }
          if (<?php echo $KFFA_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KFFA_temp; ?></div>`
          }
          if (<?php echo $KFFA_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KFFA_temp; ?></div>`
          }
          if (<?php echo $KFFA_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KFFA_temp; ?></div>`
          }
          if (<?php echo $KFFA_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KFFA_temp; ?></div>`
          }
          if (<?php echo $KFFA_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KFFA_temp; ?></div>`
          }
          if (<?php echo $KFFA_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KFFA_temp; ?></div>`
          }
          if (<?php echo $KFFA_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KFFA_temp; ?></div>`
          }
          if (<?php echo $KFFA_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KFFA_temp; ?></div>`
          }
          if (<?php echo $KFFA_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KFFA_temp; ?></div>`
          }
          if(<?php echo $KFFA_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KFFA_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KGEV_temp; ?>',
            lat: 36.433,
            lon: -81.417,
            site: 'Jefferson-Ashe County Airport',
            cond: '<?php echo $KGEV_cond; ?>',
            wind: '<?php echo $KGEV_wdir; ?> <?php echo $KGEV_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KGEV_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KGEV_temp; ?></div>`
          }
          if (<?php echo $KGEV_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KGEV_temp; ?></div>`
          }
          if (<?php echo $KGEV_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KGEV_temp; ?></div>`
          }
          if (<?php echo $KGEV_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KGEV_temp; ?></div>`
          }
          if (<?php echo $KGEV_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KGEV_temp; ?></div>`
          }
          if (<?php echo $KGEV_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KGEV_temp; ?></div>`
          }
          if (<?php echo $KGEV_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KGEV_temp; ?></div>`
          }
          if (<?php echo $KGEV_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KGEV_temp; ?></div>`
          }
          if (<?php echo $KGEV_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KGEV_temp; ?></div>`
          }
          if (<?php echo $KGEV_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KGEV_temp; ?></div>`
          }
          if(<?php echo $KGEV_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KGEV_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KEHO_temp; ?>',
            lat: 35.256,
            lon: -81.599,
            site: 'Shelby Municipal Airport',
            cond: '<?php echo $KEHO_cond; ?>',
            wind: '<?php echo $KEHO_wdir; ?> <?php echo $KEHO_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KEHO_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KEHO_temp; ?></div>`
          }
          if (<?php echo $KEHO_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KEHO_temp; ?></div>`
          }
          if (<?php echo $KEHO_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KEHO_temp; ?></div>`
          }
          if (<?php echo $KEHO_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KEHO_temp; ?></div>`
          }
          if (<?php echo $KEHO_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KEHO_temp; ?></div>`
          }
          if (<?php echo $KEHO_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KEHO_temp; ?></div>`
          }
          if (<?php echo $KEHO_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KEHO_temp; ?></div>`
          }
          if (<?php echo $KEHO_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KEHO_temp; ?></div>`
          }
          if (<?php echo $KEHO_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KEHO_temp; ?></div>`
          }
          if (<?php echo $KEHO_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KEHO_temp; ?></div>`
          }
          if(<?php echo $KEHO_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KEHO_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KEDE_temp; ?>',
            lat: 36.028,
            lon: -76.567,
            site: 'Northeastern Regional Airport',
            cond: '<?php echo $KEDE_cond; ?>',
            wind: '<?php echo $KEDE_wdir; ?> <?php echo $KEDE_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KEDE_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KEDE_temp; ?></div>`
          }
          if (<?php echo $KEDE_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KEDE_temp; ?></div>`
          }
          if (<?php echo $KEDE_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KEDE_temp; ?></div>`
          }
          if (<?php echo $KEDE_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KEDE_temp; ?></div>`
          }
          if (<?php echo $KEDE_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KEDE_temp; ?></div>`
          }
          if (<?php echo $KEDE_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KEDE_temp; ?></div>`
          }
          if (<?php echo $KEDE_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KEDE_temp; ?></div>`
          }
          if (<?php echo $KEDE_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KEDE_temp; ?></div>`
          }
          if (<?php echo $KEDE_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KEDE_temp; ?></div>`
          }
          if (<?php echo $KEDE_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KEDE_temp; ?></div>`
          }
          if(<?php echo $KEDE_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KEDE_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KOCW_temp; ?>',
            lat: 35.571,
            lon: -77.050,
            site: 'Warren Field Airport',
            cond: '<?php echo $KOCW_cond; ?>',
            wind: '<?php echo $KOCW_wdir; ?> <?php echo $KOCW_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KOCW_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KOCW_temp; ?></div>`
          }
          if (<?php echo $KOCW_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KOCW_temp; ?></div>`
          }
          if (<?php echo $KOCW_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KOCW_temp; ?></div>`
          }
          if (<?php echo $KOCW_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KOCW_temp; ?></div>`
          }
          if (<?php echo $KOCW_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KOCW_temp; ?></div>`
          }
          if (<?php echo $KOCW_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KOCW_temp; ?></div>`
          }
          if (<?php echo $KOCW_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KOCW_temp; ?></div>`
          }
          if (<?php echo $KOCW_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KOCW_temp; ?></div>`
          }
          if (<?php echo $KOCW_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KOCW_temp; ?></div>`
          }
          if (<?php echo $KOCW_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KOCW_temp; ?></div>`
          }
          if(<?php echo $KOCW_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KOCW_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KRUQ_temp; ?>',
            lat: 35.644,
            lon: -80.524,
            site: 'Rowan County Airport',
            cond: '<?php echo $KRUQ_cond; ?>',
            wind: '<?php echo $KRUQ_wdir; ?> <?php echo $KRUQ_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KRUQ_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KRUQ_temp; ?></div>`
          }
          if (<?php echo $KRUQ_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KRUQ_temp; ?></div>`
          }
          if (<?php echo $KRUQ_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KRUQ_temp; ?></div>`
          }
          if (<?php echo $KRUQ_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KRUQ_temp; ?></div>`
          }
          if (<?php echo $KRUQ_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KRUQ_temp; ?></div>`
          }
          if (<?php echo $KRUQ_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KRUQ_temp; ?></div>`
          }
          if (<?php echo $KRUQ_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KRUQ_temp; ?></div>`
          }
          if (<?php echo $KRUQ_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KRUQ_temp; ?></div>`
          }
          if (<?php echo $KRUQ_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KRUQ_temp; ?></div>`
          }
          if (<?php echo $KRUQ_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KRUQ_temp; ?></div>`
          }
          if(<?php echo $KRUQ_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KRUQ_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KDPL_temp; ?>',
            lat: 34.999,
            lon: -77.980,
            site: 'Duplin County Airport',
            cond: '<?php echo $KDPL_cond; ?>',
            wind: '<?php echo $KDPL_wdir; ?> <?php echo $KDPL_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KDPL_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KDPL_temp; ?></div>`
          }
          if (<?php echo $KDPL_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KDPL_temp; ?></div>`
          }
          if (<?php echo $KDPL_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KDPL_temp; ?></div>`
          }
          if (<?php echo $KDPL_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KDPL_temp; ?></div>`
          }
          if (<?php echo $KDPL_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KDPL_temp; ?></div>`
          }
          if (<?php echo $KDPL_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KDPL_temp; ?></div>`
          }
          if (<?php echo $KDPL_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KDPL_temp; ?></div>`
          }
          if (<?php echo $KDPL_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KDPL_temp; ?></div>`
          }
          if (<?php echo $KDPL_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KDPL_temp; ?></div>`
          }
          if (<?php echo $KDPL_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KDPL_temp; ?></div>`
          }
          if(<?php echo $KDPL_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KDPL_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KOAJ_temp; ?>',
            lat: 34.833,
            lon: -77.617,
            site: 'Albert J. Ellis Airport',
            cond: '<?php echo $KOAJ_cond; ?>',
            wind: '<?php echo $KOAJ_wdir; ?> <?php echo $KOAJ_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KOAJ_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KOAJ_temp; ?></div>`
          }
          if (<?php echo $KOAJ_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KOAJ_temp; ?></div>`
          }
          if (<?php echo $KOAJ_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KOAJ_temp; ?></div>`
          }
          if (<?php echo $KOAJ_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KOAJ_temp; ?></div>`
          }
          if (<?php echo $KOAJ_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KOAJ_temp; ?></div>`
          }
          if (<?php echo $KOAJ_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KOAJ_temp; ?></div>`
          }
          if (<?php echo $KOAJ_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KOAJ_temp; ?></div>`
          }
          if (<?php echo $KOAJ_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KOAJ_temp; ?></div>`
          }
          if (<?php echo $KOAJ_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KOAJ_temp; ?></div>`
          }
          if (<?php echo $KOAJ_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KOAJ_temp; ?></div>`
          }
          if(<?php echo $KOAJ_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KOAJ_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KEYF_temp; ?>',
            lat: 34.604,
            lon: -78.579,
            site: 'Curtis L. Brown Jr. Field Airport',
            cond: '<?php echo $KEYF_cond; ?>',
            wind: '<?php echo $KEYF_wdir; ?> <?php echo $KEYF_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KEYF_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KEYF_temp; ?></div>`
          }
          if (<?php echo $KEYF_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KEYF_temp; ?></div>`
          }
          if (<?php echo $KEYF_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KEYF_temp; ?></div>`
          }
          if (<?php echo $KEYF_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KEYF_temp; ?></div>`
          }
          if (<?php echo $KEYF_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KEYF_temp; ?></div>`
          }
          if (<?php echo $KEYF_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KEYF_temp; ?></div>`
          }
          if (<?php echo $KEYF_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KEYF_temp; ?></div>`
          }
          if (<?php echo $KEYF_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KEYF_temp; ?></div>`
          }
          if (<?php echo $KEYF_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KEYF_temp; ?></div>`
          }
          if (<?php echo $KEYF_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KEYF_temp; ?></div>`
          }
          if(<?php echo $KEYF_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KEYF_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KCPC_temp; ?>',
            lat: 34.273,
            lon: -78.715,
            site: 'Columbus County Municipal Airport',
            cond: '<?php echo $KCPC_cond; ?>',
            wind: '<?php echo $KCPC_wdir; ?> <?php echo $KCPC_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KCPC_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KCPC_temp; ?></div>`
          }
          if (<?php echo $KCPC_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KCPC_temp; ?></div>`
          }
          if (<?php echo $KCPC_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KCPC_temp; ?></div>`
          }
          if (<?php echo $KCPC_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KCPC_temp; ?></div>`
          }
          if (<?php echo $KCPC_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KCPC_temp; ?></div>`
          }
          if (<?php echo $KCPC_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KCPC_temp; ?></div>`
          }
          if (<?php echo $KCPC_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KCPC_temp; ?></div>`
          }
          if (<?php echo $KCPC_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KCPC_temp; ?></div>`
          }
          if (<?php echo $KCPC_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KCPC_temp; ?></div>`
          }
          if (<?php echo $KCPC_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KCPC_temp; ?></div>`
          }
          if(<?php echo $KCPC_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KCPC_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KVUJ_temp; ?>',
            lat: 35.417,
            lon: -80.151,
            site: 'Stanly County Airport',
            cond: '<?php echo $KVUJ_cond; ?>',
            wind: '<?php echo $KVUJ_wdir; ?> <?php echo $KVUJ_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KVUJ_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KVUJ_temp; ?></div>`
          }
          if (<?php echo $KVUJ_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KVUJ_temp; ?></div>`
          }
          if (<?php echo $KVUJ_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KVUJ_temp; ?></div>`
          }
          if (<?php echo $KVUJ_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KVUJ_temp; ?></div>`
          }
          if (<?php echo $KVUJ_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KVUJ_temp; ?></div>`
          }
          if (<?php echo $KVUJ_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KVUJ_temp; ?></div>`
          }
          if (<?php echo $KVUJ_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KVUJ_temp; ?></div>`
          }
          if (<?php echo $KVUJ_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KVUJ_temp; ?></div>`
          }
          if (<?php echo $KVUJ_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KVUJ_temp; ?></div>`
          }
          if (<?php echo $KVUJ_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KVUJ_temp; ?></div>`
          }
          if(<?php echo $KVUJ_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KVUJ_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KTTA_temp; ?>',
            lat: 35.583,
            lon: -79.101,
            site: 'Sanford-Lee County Regional Airport',
            cond: '<?php echo $KTTA_cond; ?>',
            wind: '<?php echo $KTTA_wdir; ?> <?php echo $KTTA_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KTTA_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KTTA_temp; ?></div>`
          }
          if (<?php echo $KTTA_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KTTA_temp; ?></div>`
          }
          if (<?php echo $KTTA_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KTTA_temp; ?></div>`
          }
          if (<?php echo $KTTA_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KTTA_temp; ?></div>`
          }
          if (<?php echo $KTTA_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KTTA_temp; ?></div>`
          }
          if (<?php echo $KTTA_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KTTA_temp; ?></div>`
          }
          if (<?php echo $KTTA_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KTTA_temp; ?></div>`
          }
          if (<?php echo $KTTA_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KTTA_temp; ?></div>`
          }
          if (<?php echo $KTTA_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KTTA_temp; ?></div>`
          }
          if (<?php echo $KTTA_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KTTA_temp; ?></div>`
          }
          if(<?php echo $KTTA_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KTTA_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KHBI_temp; ?>',
            lat: 35.654,
            lon: -79.895,
            site: 'Asheboro Municipal Airport',
            cond: '<?php echo $KHBI_cond; ?>',
            wind: '<?php echo $KHBI_wdir; ?> <?php echo $KHBI_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KHBI_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KHBI_temp; ?></div>`
          }
          if (<?php echo $KHBI_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KHBI_temp; ?></div>`
          }
          if (<?php echo $KHBI_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KHBI_temp; ?></div>`
          }
          if (<?php echo $KHBI_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KHBI_temp; ?></div>`
          }
          if (<?php echo $KHBI_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KHBI_temp; ?></div>`
          }
          if (<?php echo $KHBI_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KHBI_temp; ?></div>`
          }
          if (<?php echo $KHBI_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KHBI_temp; ?></div>`
          }
          if (<?php echo $KHBI_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KHBI_temp; ?></div>`
          }
          if (<?php echo $KHBI_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KHBI_temp; ?></div>`
          }
          if (<?php echo $KHBI_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KHBI_temp; ?></div>`
          }
          if(<?php echo $KHBI_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KHBI_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KGWW_temp; ?>',
            lat: 35.461,
            lon: -77.965,
            site: 'Goldsboro-Wayne Municipal Airport',
            cond: '<?php echo $KGWW_cond; ?>',
            wind: '<?php echo $KGWW_wdir; ?> <?php echo $KGWW_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KGWW_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KGWW_temp; ?></div>`
          }
          if (<?php echo $KGWW_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KGWW_temp; ?></div>`
          }
          if (<?php echo $KGWW_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KGWW_temp; ?></div>`
          }
          if (<?php echo $KGWW_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KGWW_temp; ?></div>`
          }
          if (<?php echo $KGWW_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KGWW_temp; ?></div>`
          }
          if (<?php echo $KGWW_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KGWW_temp; ?></div>`
          }
          if (<?php echo $KGWW_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KGWW_temp; ?></div>`
          }
          if (<?php echo $KGWW_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KGWW_temp; ?></div>`
          }
          if (<?php echo $KGWW_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KGWW_temp; ?></div>`
          }
          if (<?php echo $KGWW_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KGWW_temp; ?></div>`
          }
          if(<?php echo $KGWW_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KGWW_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KHRJ_temp; ?>',
            lat: 35.379,
            lon: -78.734,
            site: 'Harnett County Airport',
            cond: '<?php echo $KHRJ_cond; ?>',
            wind: '<?php echo $KHRJ_wdir; ?> <?php echo $KHRJ_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KHRJ_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KHRJ_temp; ?></div>`
          }
          if (<?php echo $KHRJ_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KHRJ_temp; ?></div>`
          }
          if (<?php echo $KHRJ_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KHRJ_temp; ?></div>`
          }
          if (<?php echo $KHRJ_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KHRJ_temp; ?></div>`
          }
          if (<?php echo $KHRJ_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KHRJ_temp; ?></div>`
          }
          if (<?php echo $KHRJ_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KHRJ_temp; ?></div>`
          }
          if (<?php echo $KHRJ_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KHRJ_temp; ?></div>`
          }
          if (<?php echo $KHRJ_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KHRJ_temp; ?></div>`
          }
          if (<?php echo $KHRJ_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KHRJ_temp; ?></div>`
          }
          if (<?php echo $KHRJ_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KHRJ_temp; ?></div>`
          }
          if(<?php echo $KHRJ_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KHRJ_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KBUY_temp; ?>',
            lat: 36.048,
            lon: -79.474,
            site: 'Burlington Alamance Regional Airport',
            cond: '<?php echo $KBUY_cond; ?>',
            wind: '<?php echo $KBUY_wdir; ?> <?php echo $KBUY_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KBUY_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KBUY_temp; ?></div>`
          }
          if (<?php echo $KBUY_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KBUY_temp; ?></div>`
          }
          if (<?php echo $KBUY_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KBUY_temp; ?></div>`
          }
          if (<?php echo $KBUY_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KBUY_temp; ?></div>`
          }
          if (<?php echo $KBUY_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KBUY_temp; ?></div>`
          }
          if (<?php echo $KBUY_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KBUY_temp; ?></div>`
          }
          if (<?php echo $KBUY_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KBUY_temp; ?></div>`
          }
          if (<?php echo $KBUY_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KBUY_temp; ?></div>`
          }
          if (<?php echo $KBUY_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KBUY_temp; ?></div>`
          }
          if (<?php echo $KBUY_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KBUY_temp; ?></div>`
          }
          if(<?php echo $KBUY_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KBUY_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KMEB_temp; ?>',
            lat: 34.791,
            lon: -79.368,
            site: 'Laurinburg Maxton Airport',
            cond: '<?php echo $KMEB_cond; ?>',
            wind: '<?php echo $KMEB_wdir; ?> <?php echo $KMEB_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KMEB_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KMEB_temp; ?></div>`
          }
          if (<?php echo $KMEB_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KMEB_temp; ?></div>`
          }
          if (<?php echo $KMEB_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KMEB_temp; ?></div>`
          }
          if (<?php echo $KMEB_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KMEB_temp; ?></div>`
          }
          if (<?php echo $KMEB_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KMEB_temp; ?></div>`
          }
          if (<?php echo $KMEB_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KMEB_temp; ?></div>`
          }
          if (<?php echo $KMEB_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KMEB_temp; ?></div>`
          }
          if (<?php echo $KMEB_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KMEB_temp; ?></div>`
          }
          if (<?php echo $KMEB_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KMEB_temp; ?></div>`
          }
          if (<?php echo $KMEB_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KMEB_temp; ?></div>`
          }
          if(<?php echo $KMEB_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KMEB_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KFAY_temp; ?>',
            lat: 34.989,
            lon: -78.880,
            site: 'Fayetteville Regional Airport',
            cond: '<?php echo $KFAY_cond; ?>',
            wind: '<?php echo $KFAY_wdir; ?> <?php echo $KFAY_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KFAY_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KFAY_temp; ?></div>`
          }
          if (<?php echo $KFAY_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KFAY_temp; ?></div>`
          }
          if (<?php echo $KFAY_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KFAY_temp; ?></div>`
          }
          if (<?php echo $KFAY_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KFAY_temp; ?></div>`
          }
          if (<?php echo $KFAY_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KFAY_temp; ?></div>`
          }
          if (<?php echo $KFAY_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KFAY_temp; ?></div>`
          }
          if (<?php echo $KFAY_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KFAY_temp; ?></div>`
          }
          if (<?php echo $KFAY_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KFAY_temp; ?></div>`
          }
          if (<?php echo $KFAY_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KFAY_temp; ?></div>`
          }
          if (<?php echo $KFAY_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KFAY_temp; ?></div>`
          }
          if(<?php echo $KFAY_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KFAY_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KRDU_temp; ?>',
            lat: 35.892,
            lon: -78.782,
            site: 'Raleigh-Durham International Airport',
            cond: '<?php echo $KRDU_cond; ?>',
            wind: '<?php echo $KRDU_wdir; ?> <?php echo $KRDU_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KRDU_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KRDU_temp; ?></div>`
          }
          if (<?php echo $KRDU_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KRDU_temp; ?></div>`
          }
          if (<?php echo $KRDU_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KRDU_temp; ?></div>`
          }
          if (<?php echo $KRDU_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KRDU_temp; ?></div>`
          }
          if (<?php echo $KRDU_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KRDU_temp; ?></div>`
          }
          if (<?php echo $KRDU_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KRDU_temp; ?></div>`
          }
          if (<?php echo $KRDU_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KRDU_temp; ?></div>`
          }
          if (<?php echo $KRDU_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KRDU_temp; ?></div>`
          }
          if (<?php echo $KRDU_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KRDU_temp; ?></div>`
          }
          if (<?php echo $KRDU_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KRDU_temp; ?></div>`
          }
          if(<?php echo $KRDU_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KRDU_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KILM_temp; ?>',
            lat: 34.267,
            lon: -77.900,
            site: 'Wilmington International Airport',
            cond: '<?php echo $KILM_cond; ?>',
            wind: '<?php echo $KILM_wdir; ?> <?php echo $KILM_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KILM_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KILM_temp; ?></div>`
          }
          if (<?php echo $KILM_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KILM_temp; ?></div>`
          }
          if (<?php echo $KILM_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KILM_temp; ?></div>`
          }
          if (<?php echo $KILM_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KILM_temp; ?></div>`
          }
          if (<?php echo $KILM_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KILM_temp; ?></div>`
          }
          if (<?php echo $KILM_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KILM_temp; ?></div>`
          }
          if (<?php echo $KILM_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KILM_temp; ?></div>`
          }
          if (<?php echo $KILM_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KILM_temp; ?></div>`
          }
          if (<?php echo $KILM_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KILM_temp; ?></div>`
          }
          if (<?php echo $KILM_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KILM_temp; ?></div>`
          }
          if(<?php echo $KILM_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KILM_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KRWI_temp; ?>',
            lat: 35.855,
            lon: -77.893,
            site: 'Rocky Mount-Wilson Regional Airport',
            cond: '<?php echo $KRWI_cond; ?>',
            wind: '<?php echo $KRWI_wdir; ?> <?php echo $KRWI_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KRWI_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KRWI_temp; ?></div>`
          }
          if (<?php echo $KRWI_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KRWI_temp; ?></div>`
          }
          if (<?php echo $KRWI_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KRWI_temp; ?></div>`
          }
          if (<?php echo $KRWI_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KRWI_temp; ?></div>`
          }
          if (<?php echo $KRWI_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KRWI_temp; ?></div>`
          }
          if (<?php echo $KRWI_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KRWI_temp; ?></div>`
          }
          if (<?php echo $KRWI_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KRWI_temp; ?></div>`
          }
          if (<?php echo $KRWI_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KRWI_temp; ?></div>`
          }
          if (<?php echo $KRWI_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KRWI_temp; ?></div>`
          }
          if (<?php echo $KRWI_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KRWI_temp; ?></div>`
          }
          if(<?php echo $KRWI_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KRWI_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KEWN_temp; ?>',
            lat: 35.068,
            lon: -77.047,
            site: 'Craven County Regional Airport',
            cond: '<?php echo $KEWN_cond; ?>',
            wind: '<?php echo $KEWN_wdir; ?> <?php echo $KEWN_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KEWN_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KEWN_temp; ?></div>`
          }
          if (<?php echo $KEWN_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KEWN_temp; ?></div>`
          }
          if (<?php echo $KEWN_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KEWN_temp; ?></div>`
          }
          if (<?php echo $KEWN_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KEWN_temp; ?></div>`
          }
          if (<?php echo $KEWN_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KEWN_temp; ?></div>`
          }
          if (<?php echo $KEWN_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KEWN_temp; ?></div>`
          }
          if (<?php echo $KEWN_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KEWN_temp; ?></div>`
          }
          if (<?php echo $KEWN_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KEWN_temp; ?></div>`
          }
          if (<?php echo $KEWN_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KEWN_temp; ?></div>`
          }
          if (<?php echo $KEWN_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KEWN_temp; ?></div>`
          }
          if(<?php echo $KEWN_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KEWN_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KMRH_temp; ?>',
            lat: 34.733,
            lon: -76.657,
            site: 'Beaufort Smith Field',
            cond: '<?php echo $KMRH_cond; ?>',
            wind: '<?php echo $KMRH_wdir; ?> <?php echo $KMRH_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KMRH_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KMRH_temp; ?></div>`
          }
          if (<?php echo $KMRH_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KMRH_temp; ?></div>`
          }
          if (<?php echo $KMRH_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KMRH_temp; ?></div>`
          }
          if (<?php echo $KMRH_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KMRH_temp; ?></div>`
          }
          if (<?php echo $KMRH_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KMRH_temp; ?></div>`
          }
          if (<?php echo $KMRH_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KMRH_temp; ?></div>`
          }
          if (<?php echo $KMRH_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KMRH_temp; ?></div>`
          }
          if (<?php echo $KMRH_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KMRH_temp; ?></div>`
          }
          if (<?php echo $KMRH_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KMRH_temp; ?></div>`
          }
          if (<?php echo $KMRH_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KMRH_temp; ?></div>`
          }
          if(<?php echo $KMRH_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KMRH_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KECG_temp; ?>',
            lat: 36.258,
            lon: -76.172,
            site: 'Elizabeth City Coast Guard Regional Airport',
            cond: '<?php echo $KECG_cond; ?>',
            wind: '<?php echo $KECG_wdir; ?> <?php echo $KECG_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KECG_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KECG_temp; ?></div>`
          }
          if (<?php echo $KECG_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KECG_temp; ?></div>`
          }
          if (<?php echo $KECG_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KECG_temp; ?></div>`
          }
          if (<?php echo $KECG_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KECG_temp; ?></div>`
          }
          if (<?php echo $KECG_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KECG_temp; ?></div>`
          }
          if (<?php echo $KECG_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KECG_temp; ?></div>`
          }
          if (<?php echo $KECG_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KECG_temp; ?></div>`
          }
          if (<?php echo $KECG_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KECG_temp; ?></div>`
          }
          if (<?php echo $KECG_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KECG_temp; ?></div>`
          }
          if (<?php echo $KECG_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KECG_temp; ?></div>`
          }
          if(<?php echo $KECG_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KECG_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $K7W6_temp; ?>',
            lat: 35.562,
            lon: -75.956,
            site: 'Hyde County Airport',
            cond: '<?php echo $K7W6_cond; ?>',
            wind: '<?php echo $K7W6_wdir; ?> <?php echo $K7W6_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $K7W6_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $K7W6_temp; ?></div>`
          }
          if (<?php echo $K7W6_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $K7W6_temp; ?></div>`
          }
          if (<?php echo $K7W6_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $K7W6_temp; ?></div>`
          }
          if (<?php echo $K7W6_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $K7W6_temp; ?></div>`
          }
          if (<?php echo $K7W6_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $K7W6_temp; ?></div>`
          }
          if (<?php echo $K7W6_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $K7W6_temp; ?></div>`
          }
          if (<?php echo $K7W6_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $K7W6_temp; ?></div>`
          }
          if (<?php echo $K7W6_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $K7W6_temp; ?></div>`
          }
          if (<?php echo $K7W6_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $K7W6_temp; ?></div>`
          }
          if (<?php echo $K7W6_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $K7W6_temp; ?></div>`
          }
          if(<?php echo $K7W6_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $K7W6_temp; ?></div>`
          }
        }
            }
        }, {
            name: '<?php echo $KHSE_temp; ?>',
            lat: 35.232,
            lon: -75.623,
            site: 'Micthell Field',
            cond: '<?php echo $KHSE_cond; ?>',
            wind: '<?php echo $KHSE_wdir; ?> <?php echo $KHSE_wind; ?>',
            dataLabels: {
			style: {"fontSize": "28px", "fontWeight": "bold"},
                            formatter() {
          if (<?php echo $KHSE_temp; ?> < 10) {
            return `<div style="color:#c700d3"><?php echo $KHSE_temp; ?></div>`
          }
          if (<?php echo $KHSE_temp; ?> < 20) {
            return `<div style="color:#7400d3"><?php echo $KHSE_temp; ?></div>`
          }
          if (<?php echo $KHSE_temp; ?> < 30) {
            return `<div style="color:#0a00ff"><?php echo $KHSE_temp; ?></div>`
          }
          if (<?php echo $KHSE_temp; ?> < 40) {
            return `<div style="color:#0081f8"><?php echo $KHSE_temp; ?></div>`
          }
          if (<?php echo $KHSE_temp; ?> < 50) {
            return `<div style="color:#00cce4"><?php echo $KHSE_temp; ?></div>`
          }
          if (<?php echo $KHSE_temp; ?> < 60) {
            return `<div style="color:#00d591"><?php echo $KHSE_temp; ?></div>`
          }
          if (<?php echo $KHSE_temp; ?> < 70) {
            return `<div style="color:#00d716"><?php echo $KHSE_temp; ?></div>`
          }
          if (<?php echo $KHSE_temp; ?> < 80) {
            return `<div style="color:#eac500"><?php echo $KHSE_temp; ?></div>`
          }
          if (<?php echo $KHSE_temp; ?> < 90) {
            return `<div style="color:#fd9e00"><?php echo $KHSE_temp; ?></div>`
          }
          if (<?php echo $KHSE_temp; ?> < 100) {
            return `<div style="color:#fd4c00"><?php echo $KHSE_temp; ?></div>`
          }
          if(<?php echo $KHSE_temp; ?> > 99){
            return `<div style="color:#fd0000"><?php echo $KHSE_temp; ?></div>`
          }
        }
            }
            }]
        }]
    });
</script>






