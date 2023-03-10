package com.example.upsaalert;

import android.content.Intent;
import android.os.StrictMode;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.text.Editable;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
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
import com.bumptech.glide.Glide;
import com.example.upsaalert.model.CommentAdapter;
import com.example.upsaalert.model.Comments;
import com.example.upsaalert.model.EventAdapter;
import com.example.upsaalert.model.Events;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class EventsActivity extends AppCompatActivity {
    private RecyclerView recyclerView;
    private RecyclerView.Adapter adapter;
    private List<Comments> listItems;
    private RequestQueue mRequestQueue;
    private StringRequest mStringRequest;
    private ImageView imgs;
    private TextView title,dates,location,call,hosted,evntdsec,eventtimme;
    private EditText comnbox;
    private Button combtn;
    private String getevents = "http://192.168.43.141/AndroidPhp/getEventss.php";
    private String urls = "http://192.168.43.141/AndroidPhp/getComments.php";
    private FloatingActionButton floting;
    private ProgressBar progressBar;
    FirebaseAuth mAuth;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_events);
        mAuth = FirebaseAuth.getInstance();
        if (android.os.Build.VERSION.SDK_INT > 9)
        {
            StrictMode.ThreadPolicy policy = new
                    StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        imgs = (ImageView) findViewById(R.id.eventimage);
        title = (TextView) findViewById(R.id.eeventilt);
        dates = (TextView) findViewById(R.id.eventdate);
        location = (TextView) findViewById(R.id.eventloc);
        call = (TextView) findViewById(R.id.eventcall);
        hosted = (TextView) findViewById(R.id.eventhost);
        evntdsec = (TextView) findViewById(R.id.evexntdesc);
        eventtimme = (TextView) findViewById(R.id.eventtime);
        progressBar = (ProgressBar) findViewById(R.id.progressBar5);


        BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.navigation);
        navigation.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);


       /* floting = (FloatingActionButton) findViewById(R.id.fab);
        floting.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String cid = getIntent().getStringExtra("eventid");
                Intent intent = new Intent(EventsActivity.this,AddComment.class);
                intent.putExtra("commtid",cid);
                startActivity(intent);
            }
        });*/

        recyclerView = (RecyclerView) findViewById(R.id.recycleviewws);
        listItems = new ArrayList<>();
         loadDataCategory(getIntent().getStringExtra("eventid"));
        LoadEvents(getIntent().getStringExtra("eventid"));

    }

    private void LoadEvents(String eventid) {
        DatabaseReference reference = FirebaseDatabase.getInstance().getReference("Events").child(eventid);
        reference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                Events events = dataSnapshot.getValue(Events.class);
                title.setText(events.getTitle());
                location.setText(events.getLocation());
                dates.setText(events.getDatefrm());
                call.setText(events.getContact());
                hosted.setText(events.getCohost());
                evntdsec.setText(events.getDescription());
                eventtimme.setText(events.getTimefrm());
                String imgurl = events.getImage();
                Picasso.with(getApplicationContext())
                        .load(imgurl)
                        .into(imgs);
                progressBar.setVisibility(View.INVISIBLE);
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        });
    }

    private void loadDataCategory(final String eventid) {
        mRequestQueue = Volley.newRequestQueue(this);
        //String Request initialized
        mStringRequest = new StringRequest(Request.Method.POST, urls, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
               /* Toast.makeText(EventsActivity.this, ""+response, Toast.LENGTH_SHORT).show();
                System.out.println(""+response);*/

                if(response.matches("failed")){
                    Toast.makeText(EventsActivity.this, "Serial Number one or Product Dont Exit", Toast.LENGTH_SHORT).show();
                }else{
                    try {
                        JSONArray array = new JSONArray(response);
                        for(int i=0; i<array.length(); i++){
                            JSONObject obj = array.getJSONObject(i);
                            String Eventid = obj.getString("Eventid");
                            String fullname =  obj.getString("Fullname");
                            String commnt = obj.getString("Cmsg");
                            String comdate = obj.getString("Commentdate");
                            String imgs = obj.getString("images");
                            Comments item = new Comments(Eventid,fullname,commnt,comdate,imgs);
                            listItems.add(item);
                        }

                        adapter = new CommentAdapter(listItems,getApplicationContext());
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
                Toast.makeText(EventsActivity.this, ""+error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("eventid",eventid);
                // params.put("email",email);
                return params;
            }

        };

        mRequestQueue.add(mStringRequest);
    }


   /* private void LoadEvents(final String eventid) {
        mRequestQueue = Volley.newRequestQueue(this);
        //String Request initialized
        mStringRequest = new StringRequest(Request.Method.POST, getevents, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                System.out.println(""+response);
                if(response.matches("failed")){
                    Toast.makeText(EventsActivity.this, "Serial Number two  or Product Dont Exit", Toast.LENGTH_SHORT).show();
                }else{
                    try {
                        JSONArray array = new JSONArray(response);
                        JSONObject obj = array.getJSONObject(0);
                        title.setText(obj.getString("Title"));
                        location.setText(obj.getString("Location"));
                        dates.setText(obj.getString("datefrm"));
                        call.setText(obj.getString("Contact"));
                        hosted.setText(obj.getString("cohost"));
                        evntdsec.setText(obj.getString("Description"));
                        eventtimme.setText(obj.getString("timefrm"));
                        String imgurl =  "http://192.168.43.141/NCWC/images/"+obj.getString("image");
                        Glide.with(getApplicationContext())
                                .load(imgurl)
                                .into(imgs);
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(EventsActivity.this, ""+error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("eventid",eventid);
                // params.put("email",email);
                return params;
            }

        };

        mRequestQueue.add(mStringRequest);
    }*/



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
                startActivity(new Intent(EventsActivity.this,LoginActivity.class));
                break;
            case R.id.history:
                Intent intent = new Intent(EventsActivity.this,HistoryActivity.class);
                startActivity(intent);
                break;
            case R.id.events:
                Intent intent2 = new Intent(EventsActivity.this,UpcomingEvents.class);
                startActivity(intent2);
                break;
            case R.id.mainpro:
                Intent prilein = new Intent(EventsActivity.this,MainProfile.class);
                startActivity(prilein);
                break;
            case R.id.profile:
                Intent intent4 = new Intent(EventsActivity.this,ProfileActivity.class);
                startActivity(intent4);
                break;
        }
        return super.onOptionsItemSelected(item);
    }


    private BottomNavigationView.OnNavigationItemSelectedListener mOnNavigationItemSelectedListener
            = new BottomNavigationView.OnNavigationItemSelectedListener() {

        @Override
        public boolean onNavigationItemSelected(@NonNull MenuItem item) {
            switch (item.getItemId()) {
                case R.id.navigation_home:
                    startActivity(new Intent(EventsActivity.this,MainActivity.class));
                    return true;
                case R.id.navigation_dashboard:
                    String cidd = getIntent().getStringExtra("eventid");
                    Intent intent2 = new Intent(EventsActivity.this,CommentsView.class);
                    intent2.putExtra("eventid",cidd);
                    startActivity(intent2);
                    return true;
                case R.id.navigation_notifications:
                    String cid = getIntent().getStringExtra("eventid");
                    Intent intent = new Intent(EventsActivity.this,AddComment.class);
                    intent.putExtra("commtid",cid);
                    startActivity(intent);
                    return true;
            }
            return false;
        }
    };


}
