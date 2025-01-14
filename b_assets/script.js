function numOfProd() {
    function updateValue(value) {
      let element = document.querySelector(".prod_left_val");
      value = (value = +element.innerHTML - value) < 5 ? 5 : value;
      element.innerHTML = value;
    }
  
    setTimeout(function () {
      updateValue(2);
      setInterval(function () {
        updateValue(Math.floor(2 * Math.random()) + 2);
      }, 1000 * (Math.floor(5 * Math.random()) + 20));
    }, 2000);
  }

  window.addEventListener("DOMContentLoaded", () => {
    
  });
  
  numOfProd();
  document.addEventListener("DOMContentLoaded", function() {
    let o, l = 0, n = 600;

    function c() {
        --n;
        let e = Math.floor(n / 60), t = n - 60 * e;
        0 == e && 0 == t && clearInterval(o), t = 10 <= t ? t : "0" + t, e = 10 <= e ? e : "0" + e, document.querySelector("#mins").innerHTML = e, document.querySelector("#secs").innerHTML = t
    }

    const e = document.querySelectorAll(".quiz_option"), t = document.querySelectorAll(".quiz_step"),
        r = document.querySelectorAll(".quiz_num"), i = document.querySelectorAll(".quiz_form form input");
    let s = !1;
    e.forEach(e => {
        e.addEventListener("click", () => {
            s || (s = !0, l++, e.classList.add("active"), setTimeout(() => {
                t.forEach((e, t) => {
                    t == l ? (e.style.display = "block", setTimeout(() => {
                        e.classList.add("active")
                    }, 400), 3 == l ? (document.querySelector(".quiz_nums").style.display = "none", document.querySelector(".quiz_title").style.display = "none", document.querySelector(".order_title").style.display = "block", o = setInterval(c, 1e3), document.querySelector("#prod_img").style.display = "block", setTimeout(() => {
                        document.querySelector("#prod_img").classList.add("active"), setTimeout(() => {
                            var e = $("#roulette"), e = $(e).offset().top;
                            $("body,html").animate({scrollTop: e}, 777)
                        }, 200)
                    }, 400)) : r[l].classList.add("active")) : (e.classList.remove("active"), setTimeout(() => {
                        e.style.display = "none"
                    }, 400))
                }), s = !1
            }, 400))
        })
    }), i.forEach(e => {
        e.addEventListener("focus", () => {
            e.classList.add("active")
        })
    })



    var recentPur = [
      ["Васелина – Київ", "3 упаковки", "5 хвилину тому"],
      ["Галина – Харків", "2 упаковки", "5 хвилину тому"],
      ["Діна - Полтава", "4 упаковки", "22 хвилину тому"],
      ["Алевтіна – Київ", "3 упаковки", "23 хвилини тому"],
      ["Евгенія - Чернігів", "2 упаковки", "24 минуты назад"],
      ["Серафіма – Одеса", "4 упаковки", "27 хвилин тому"],
      ["Валентина - Київ", "3 упаковки", "30 хвилин тому"],
      ["Людмила – Львів", "3 упаковки", "31 хвилину тому"],
      ["Марія – Харків", "2 упаковки", "33 хвилину тому"],
      ["Ксенія – Вінниця", "3 упаковки", "36 хвилину тому"],
      ["Олександра - Суми", "2 упаковки", "45 хвилину тому"],
      ["Стафанія – Київ", "4 упаковки", "1 хвилину тому"],
      ["Катерина-Харків", "3 упаковки", "1 хвилину тому"],
      ["Вікторія – Чернігів", "3 упаковки", "1 хвилину тому"],
      ["Владеса - Запоріжжя", "4 упаковки", "1 хвилину тому"],
      ["Любов – Дніпро", "2 упаковки", "1 хвилину тому"]
    ];
    let randPur = Math.floor(Math.random() * 10);
    let timeRand = Math.round(Math.random() * 29) + 1;
    document.getElementById("notify-1").innerHTML = recentPur[randPur][0];
    document.getElementById("notify-2").innerHTML = recentPur[randPur][1];
    document.getElementById("notify-3").innerHTML = timeRand + " секунди тому";
    
    setInterval(function () {
        let customSocialProof = document.querySelector(".custom-social-proof");
        customSocialProof.style.display = (customSocialProof.style.display === "none") ? "block" : "none";
    
        if (customSocialProof.style.display === "none") {
            let randPur = Math.floor(Math.random() * recentPur.length);
            document.getElementById("notify-1").innerHTML = recentPur[randPur][0];
            document.getElementById("notify-2").innerHTML = recentPur[randPur][1];
            document.getElementById("notify-3").innerHTML = timeRand + " секунди тому";
        }
    }, 8000);
    document.querySelector(".custom-notification-content").addEventListener("click", function () {
        document.querySelector(".custom-social-proof").style.display = "none";
    });
    
    setTimeout(function () {
        window.addEventListener("popstate", function (event) {
            if (event.state && event.state.wisepops === "exit-intent") {
                showCliamLayer();
            }
        });
    }, 5000);
    
    if (!window.history.state || window.history.state.wisepops !== "normal-intent") {
        window.history.replaceState({wisepops: "exit-intent"}, "");
        window.history.pushState({wisepops: "normal-intent"}, "");
    }
})
