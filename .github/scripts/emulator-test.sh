#!/usr/bin/env bash
# Installs the debug build, opens each main section through a deep link and screenshots it.
set -x
OUT=out/screens
mkdir -p "$OUT"
adb install -r out/app-debug.apk
adb shell am start -W -n com.alifvisa.app/.MainActivity
sleep 4
adb exec-out screencap -p > "$OUT/00-launch.png"
sleep 26
adb exec-out screencap -p > "$OUT/01-home.png"
adb shell input swipe 540 1700 540 600 300
sleep 3
adb exec-out screencap -p > "$OUT/02-home-scrolled.png"
shot() {
  adb shell "am start -W -a android.intent.action.VIEW -d '$2' com.alifvisa.app"
  sleep "${3:-14}"
  adb exec-out screencap -p > "$OUT/$1.png"
}
shot 03-apply "https://alifvisa.com/visa/search/"
shot 04-track "https://alifvisa.com/track-application/"
shot 05-help "https://alifvisa.com/contact/"
shot 06-account "https://alifvisa.com/dashboard/"
shot 07-about "https://alifvisa.com/about/"
shot 08-blog "https://alifvisa.com/blog/"
shot 09-apply-form "https://alifvisa.com/apply/?from=PK&to=GB&purpose=tourism&type=visit-visa" 16
adb shell input keyevent KEYCODE_BACK
sleep 4
adb exec-out screencap -p > "$OUT/10-after-back.png"
adb logcat -d -b crash > out/logcat-crash.txt 2>&1 || true
adb logcat -d | grep -iE "alifvisa|render process|libc|DEBUG|ActivityTaskManager|lowmemorykiller|AndroidRuntime" | tail -300 > out/logcat-app.txt 2>&1 || true
adb shell dumpsys package com.alifvisa.app | grep -E "versionCode|versionName|targetSdk" > out/package-info.txt || true
exit 0
