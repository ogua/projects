package com.example.upsaalert;

import android.animation.ArgbEvaluator;
import android.app.Notification;
import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.content.Intent;
import android.os.Build;
import android.support.annotation.NonNull;
import android.support.v4.app.NotificationCompat;
import android.support.v4.app.NotificationManagerCompat;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.iid.FirebaseInstanceId;
import com.google.firebase.iid.InstanceIdResult;
import com.google.firebase.messaging.FirebaseMessaging;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class MainActivity extends AppCompatActivity {
    //1. NOTIFICAL CHANNEL
    //2. NOTIFICATION BUILDER
    //3. NOTIFICATION MANAGER

    private FirebaseAuth mAuth;
    public static final String CHANNEL_ID = "UPSAALERT";
    private static final String CHANNEL_NAME = "UPSAALERT";
    private static final String CHANNEL_DESCRIPTION = "UPSA ALERT NOTIFICATION";
    ViewPager viewPager;
    AdapterFragrance adapter;
    List<FragmentModel>items;
    Integer[] colors = null;
    ArgbEvaluator argbEvaluator = new ArgbEvaluator();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mAuth = FirebaseAuth.getInstance();


        items = new ArrayList<>();
        items.add(new FragmentModel(R.drawable.ups2,"UPSA LECTURE HALL", ""));
        items.add(new FragmentModel(R.drawable.up1,"UPSA CAMPUS", " "));
        items.add(new FragmentModel(R.drawable.up2,"UPSA MAIN ADMINISTRATION", " "));

        adapter = new AdapterFragrance(items,this);

        viewPager = findViewById(R.id.viewpager);
        viewPager.setAdapter(adapter);
        viewPager.setPadding(40,0,40,0);

        Integer[] colors_temp = {
                getResources().getColor(R.color.color1),
                getResources().getColor(R.color.color2),
                getResources().getColor(R.color.color3)
        };


        colors = colors_temp;

        viewPager.setOnPageChangeListener(new ViewPager.OnPageChangeListener() {
            @Override
            public void onPageScrolled(int i, float v, int i1) {
                if (i < (adapter.getCount() - 1) && i < (colors.length -1)){
                    viewPager.setBackgroundColor(
                            (Integer) argbEvaluator.evaluate(
                                    v,
                                    colors[i],
                                    colors[i + 1]
                            )
                    );
                }else{
                    viewPager.setBackgroundColor(colors[colors.length -1 ]);
                }
            }

            @Override
            public void onPageSelected(int i) {

            }

            @Override
            public void onPageScrollStateChanged(int i) {

            }
        });

        FirebaseMessaging.getInstance().subscribeToTopic("UPSAL200");
        FirebaseInstanceId.getInstance().getInstanceId()
                .addOnCompleteListener(new OnCompleteListener<InstanceIdResult>() {
                    @Override
                    public void onComplete(@NonNull Task<InstanceIdResult> task) {
                        if (task.isSuccessful()){
                            //display token
                            String token = task.getResult().getToken();
                            saveToken(token);
                        }else{
                            //Token Not Generated
                        }
                    }});
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.main_menu,menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()){
            case R.id.logout:
                mAuth.signOut();
                finish();
                startActivity(new Intent(MainActivity.this,LoginActivity.class));
                break;
            case R.id.history:
                    Intent intent = new Intent(MainActivity.this,HistoryActivity.class);
                    startActivity(intent);
                break;
            case R.id.events:
                Intent intent2 = new Intent(MainActivity.this,UpcomingEvents.class);
                startActivity(intent2);
                break;
            case R.id.mainpro:
                Intent prilein = new Intent(MainActivity.this,MainProfile.class);
                startActivity(prilein);
                break;
            case R.id.profile:
                Intent intent3 = new Intent(MainActivity.this,ProfileActivity.class);
                startActivity(intent3);
                break;
        }
        return super.onOptionsItemSelected(item);
    }

    private void saveToken(String token) {
        FirebaseUser user = mAuth.getCurrentUser();
        DatabaseReference reference = FirebaseDatabase.getInstance().getReference("users").child(user.getUid());
        HashMap<String, Object> hashMap = new HashMap<>();
        hashMap.put("token",token);
        reference.updateChildren(hashMap);
    }

    @Override
    protected void onStart() {
        super.onStart();
        if (mAuth.getCurrentUser() == null){
            Intent intent = new Intent(MainActivity.this,LoginActivity.class);
            intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK | Intent.FLAG_ACTIVITY_CLEAR_TASK);
            startActivity(intent);
        }
    }
}

