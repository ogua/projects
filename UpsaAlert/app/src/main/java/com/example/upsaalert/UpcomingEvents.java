package com.example.upsaalert;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.StrictMode;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.DatePicker;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.upsaalert.model.EventAdapter;
import com.example.upsaalert.model.Events;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import org.joda.time.DateMidnight;
import org.joda.time.Days;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class UpcomingEvents extends AppCompatActivity {
    private RecyclerView recyclerView;
    private RecyclerView.Adapter adapter;
    private List<Events> listItems;
    private RequestQueue mRequestQueue;
    private StringRequest mStringRequest;
    private ProgressBar progressBar;
    private FirebaseAuth mAuth;
    private TextView hideevnt;

    private String url = "http://192.168.43.141/AndroidPhp/getEvents.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        getSupportActionBar().setTitle("UpComing Events");
        setContentView(R.layout.activity_upcoming_events);
        mAuth = FirebaseAuth.getInstance();
        if (android.os.Build.VERSION.SDK_INT > 9)
        {
            StrictMode.ThreadPolicy policy = new
                    StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        hideevnt = (TextView) findViewById(R.id.eventhide);
        recyclerView = (RecyclerView) findViewById(R.id.recycleview);
        listItems = new ArrayList<>();
        progressBar = (ProgressBar)findViewById(R.id.progressBar2);
        loadDataCategory();


    }


    public String getCurrentdate() {
        DatePicker picker = new DatePicker(this);
        StringBuilder builder = new StringBuilder();
        builder.append(picker.getYear()+"-");
        builder.append((picker.getMonth() + 1)+"-");
        builder.append(picker.getDayOfMonth());
        return builder.toString();
    }

    private void loadDataCategory() {
        DatabaseReference reference = FirebaseDatabase.getInstance().getReference("Events");
        reference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                listItems.clear();
                for (DataSnapshot snapshot: dataSnapshot.getChildren()){
                    progressBar.setVisibility(View.INVISIBLE);
                    Events events = snapshot.getValue(Events.class);

                    //get date Difference
                    DateMidnight endday = new DateMidnight(events.getDatefrm());
                    DateMidnight startday = new DateMidnight(getCurrentdate());
                    int days = Days.daysBetween(startday, endday).getDays();

                    if (days > 0){

                        String Eventid = events.getEventid();
                        String title = events.getTitle();
                        String datefrom =  events.getDatefrm();
                        String img = events.getImage();
                        String contact = events.getContact();
                        String location =  events.getLocation();
                        String cohost =   events.getLocation();



                        Events item = new Events(Eventid,title,img);
                        listItems.add(item);
                    }
                }

                adapter = new EventAdapter(listItems,getApplicationContext());
                recyclerView.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
                recyclerView.setAdapter(adapter);

                if (listItems.isEmpty()){
                    hideevnt.setVisibility(View.VISIBLE);
                    recyclerView.setVisibility(View.GONE);
                    progressBar.setVisibility(View.INVISIBLE);
                }else {
                    hideevnt.setVisibility(View.INVISIBLE);
                    recyclerView.setVisibility(View.VISIBLE);
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {
                Toast.makeText(UpcomingEvents.this, ""+databaseError.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });
    }

    /*private void loadDataCategory() {
        progressBar.setVisibility(View.VISIBLE);
        mRequestQueue = Volley.newRequestQueue(this);
        //String Request initialized
        mStringRequest = new StringRequest(Request.Method.GET, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                progressBar.setVisibility(View.INVISIBLE);
                if(response.matches("failed")){
                    Toast.makeText(UpcomingEvents.this, "Serial Number or Product Dont Exit", Toast.LENGTH_SHORT).show();
                }else{
                    try {
                        JSONArray array = new JSONArray(response);
                        for(int i=0; i<array.length(); i++){
                            JSONObject obj = array.getJSONObject(i);
                            String Eventid = obj.getString("Eventid");
                            String title =  obj.getString("Title");
                            String datefrom = obj.getString("datefrm");
                            String img =  "http://192.168.43.141/NCWC/images/"+obj.getString("image");
                            String contact =     obj.getString("Contact");
                            String location =     obj.getString("Location");
                            String cohost =     obj.getString("cohost");
                            Events item = new Events(Eventid,title,location,contact,datefrom,img,cohost);
                            listItems.add(item);
                        }

                        adapter = new EventAdapter(listItems,getApplicationContext());
                        recyclerView.setLayoutManager(new LinearLayoutManager(getApplicationContext()));
                        //recyclerView.setLayoutManager(new GridLayoutManager(getApplicationContext(),2));
                        recyclerView.setAdapter(adapter);
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(UpcomingEvents.this, ""+error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });

        mRequestQueue.add(mStringRequest);
    }
*/

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.main_menu,menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()){
            case android.R.id.home:
                Intent intent3 = new Intent(UpcomingEvents.this,MainActivity.class);
                startActivity(intent3);
                break;
            case R.id.logout:
                mAuth.signOut();
                finish();
                startActivity(new Intent(UpcomingEvents.this,LoginActivity.class));
                break;
            case R.id.history:
                Intent intent = new Intent(UpcomingEvents.this,HistoryActivity.class);
                startActivity(intent);
                break;
            case R.id.events:
                Intent intent2 = new Intent(UpcomingEvents.this,UpcomingEvents.class);
                startActivity(intent2);
                break;
            case R.id.mainpro:
                Intent prilein = new Intent(UpcomingEvents.this,MainProfile.class);
                startActivity(prilein);
                break;
            case R.id.profile:
                Intent intent4 = new Intent(UpcomingEvents.this,ProfileActivity.class);
                startActivity(intent4);
                break;
        }
        return super.onOptionsItemSelected(item);
    }
}
